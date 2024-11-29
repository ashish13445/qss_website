<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\LeaveRequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\TimeEntry;
use Carbon\Carbon;
class LeaveController extends Controller
{
    public function index(){
        return Inertia::render('Leaves/Index', [
            'auth' => [
                'user' => Auth::user(), // Assuming you want to pass the authenticated user
            ],
        ]);
    }

    public function submit(Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required', // Ensure user_id is provided
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason'=>'required',
            'type'=>'required'
        ]);
    
        // Add user_id to the rules for uniqueness check
        $rules = [
            'start_date' => [
                'unique:leaves,start_date,NULL,id,user_id,' . $validatedData['user_id'] . ',status,!rejected'
            ],
            'end_date' => [
                'unique:leaves,end_date,NULL,id,user_id,' . $validatedData['user_id'] . ',status,!rejected'
            ],
        ];
    
        // Merge the rules with the existing rules
        $validatedData = array_merge($validatedData, $request->validate($rules));
        // Create the leave
        $leave = Leave::create($validatedData);
    
        $reportingManagers = Auth::user()->reportingManagers;

// If reporting managers exist, notify each one
if ($reportingManagers->isNotEmpty()) {
    foreach ($reportingManagers as $reportingManager) {
        $reportingManager->notify(new LeaveRequestNotification($leave));
    }
}
        // Return a success response
        return response()->json(['message' => 'Leave submitted successfully'], 200);
    }
    
    public function history(){
        $user = Auth::user();
        $leaves = Leave::where('user_id',$user->id)->get();
        return response()->json($leaves);
    }
    public function getRequests()
{
    $reportingManagerId = Auth::user()->id;

    // Get all users whose reporting manager is the authenticated user
    $usersWithReportingManager = User::whereHas('reportingManagers', function ($query) use ($reportingManagerId) {
        $query->where('reporting_manager_id', $reportingManagerId);
    })->pluck('id');
    
    // Get pending leave requests associated with those users
    $pendingLeaveRequests = Leave::with('user')
        ->whereIn('user_id', $usersWithReportingManager)
        ->where('status', 'pending')
        ->get();

    return response()->json(['pendingLeaveRequests' => $pendingLeaveRequests]);
}

    public function acceptRequest(Request $request){
        $leaveRequestId = $request->input('id');
    
        // Assuming you are using Eloquent ORM
        $leaveRequest = Leave::find($leaveRequestId);
    
        if (!$leaveRequest) {
            // Handle the case where the leave request is not found
            return response()->json(['error' => 'Leave request not found'], 404);
        }
    
        // Update the status and reason
        $leaveRequest->status = 'approved';
    
        // Save the changes
        $leaveRequest->save();

        $startDate = Carbon::parse($leaveRequest->start_date);
        $endDate = Carbon::parse($leaveRequest->end_date);
        $days = $endDate->diffInDays($startDate) + 1;
        // Iterate over each date in the range
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            TimeEntry::create([
                'user_id' => $leaveRequest->user_id,
                'date' => $date->toDateString(),
                // Set clock_in and clock_out to null to represent a leave day
                'clock_in' => null,
                'clock_out' => null,
                'remarks'=> $leaveRequest->type,
                // Optionally, you can set additional fields such as 'status' or 'remarks' here
            ]);
        }
      
        
        $user = User::find($leaveRequest->user_id);
        if($leaveRequest->type === 'privilege_leave'){
            $user->update(['paid_leaves' => $user->paid_leaves - $days]);
        }else if($leaveRequest->type === 'sick_leave'){
            $user->update(['sick_leaves' => $user->sick_leaves - $days]);
        } else {
            $user->update(['casual_leaves' => $user->casual_leaves - $days]);
        }

        // You can return a response indicating success if needed
        return response()->json(['message' => 'Leave request accepted successfully']);
    }

    public function rejectRequest(Request $request){
        $leaveRequestId = $request->input('id');
    
        // Assuming you are using Eloquent ORM
        $leaveRequest = Leave::find($leaveRequestId);
    
        if (!$leaveRequest) {
            // Handle the case where the leave request is not found
            return response()->json(['error' => 'Leave request not found'], 404);
        }
    
        // Update the status and reason
        $leaveRequest->status = 'rejected';
    
        // Save the changes
        $leaveRequest->save();
    }

    public function isLeaveApproved($date){
        $leaveExists = Leave::where('status', 'approved')
        ->where(function ($query) use ($date) {
            $query->whereDate('start_date', '<=', $date)
                  ->whereDate('end_date', '>=', $date);
        })
        ->exists();

    return response()->json($leaveExists);
    }
    
    
}
