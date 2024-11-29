<?php

namespace App\Http\Controllers;
use App\Notifications\RegularizeRequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\RegularizeRequest;
use App\Models\TimeEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
class RegularizeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve regularize requests
        $regularizeRequests = RegularizeRequest::where('user_id',$request->user_id)->get();

        return response()->json($regularizeRequests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validate and create a regularize request
        $request->validate([
            'user_id' => 'required',
            'regularize_type' => 'required',
            'request_for'=> 'required'
        ]);

        $regularizeRequest = RegularizeRequest::create($request->all());
        
        // $reportingManager = Auth::user()->reportingManager;
    
        // // If reporting manager exists, notify them
        // if ($reportingManager) {
        //     $reportingManager->notify(new RegularizeRequestNotification($regularizeRequest));
        // }
        $reportingManagers = Auth::user()->reportingManagers;

// If reporting managers exist, notify each one
if ($reportingManagers->isNotEmpty()) {
    foreach ($reportingManagers as $reportingManager) {
            $reportingManager->notify(new RegularizeRequestNotification($regularizeRequest));
    }
}
        return response()->json($regularizeRequest, 201);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RegularizeRequest $regularizeRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegularizeRequest $regularizeRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegularizeRequest $regularizeRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegularizeRequest $regularizeRequest)
    {
        //
    }

    public function getRequests(Request $request){
        
        $reportingManagerId = Auth::user()->id;

        // Get all users whose reporting manager is the authenticated user
        $usersWithReportingManager = User::whereHas('reportingManagers', function ($query) use ($reportingManagerId) {
            $query->where('reporting_manager_id', $reportingManagerId);
        })->pluck('id');

        $requests = RegularizeRequest::with('user')
        ->whereIn('user_id', $usersWithReportingManager)
        ->where('status',0)
        ->get();

        return response()->json($requests);
    }
    public function acceptRequest(Request $request){
        $clockIn = Carbon::parse($request->clock_in);
        $clockOut = Carbon::parse($request->clock_out);
        // Calculate the difference between clock in and clock out in minutes
        $minutesDifference = $clockOut->diffInMinutes($clockIn);
        
        // Convert the minutes difference to hours
         // Convert seconds to hours // Convert minutes to hours
        $hours = floor($minutesDifference / 60);
        $minutes = $minutesDifference % 60;
        $timeFormat = sprintf('%02d:%02d:00', $hours, $minutes);
        if(TimeEntry::where('user_id',$request->user_id)->where('date',$request->request_for)->first()){
            TimeEntry::where('user_id',$request->user_id)
            ->where('date',$request->request_for)
            ->update(['clock_in' => $request->clock_in, 'clock_out' => $request->clock_out, 'working_hours'=>$timeFormat]);
            
            RegularizeRequest::where('id',$request->id)
            ->update(['status'=>1]);
            return response()->json('updated');
        }else{
            $remarks = '';
            $clockInTime = $request->clock_in;
            $clockOutTime = $request->clock_out;
            if($request->regularize_type == 'workFromHome'){
                $remarks = 'work_from_home';
                $clockInTime = null;
                $clockOutTime = null;
                $timeFormat = null;
            }
            TimeEntry::create([
                'user_id' => $request->user_id,
                'clock_in' => $clockInTime,
                'clock_out' => $clockOutTime,
                'date' => $request->request_for,
                'working_hours'=>$timeFormat,
                'shift_no'=>$request->shift,
                'remarks' => $remarks
            ]);

         RegularizeRequest::where('id',$request->id)
         ->update(['status'=>1]);
            return response()->json('accepted');

        }
        
    }
    public function rejectRequest(Request $request){
        RegularizeRequest::where('id',$request->id)
         ->update(['status'=>2]);
            return response()->json('rejected');

        }
    
}
