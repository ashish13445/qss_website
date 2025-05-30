<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TimeEntry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TimeEntryController extends Controller
{
    public function clockIn(Request $request)
    {
        $id = null;
        if($request->id){
            $id=$request->id;
        }else {
            $id = auth()->id();
        }
$date = Carbon::now()->format('Y-m-d');
        // Check if the user is already clocked in
        $existingEntry = TimeEntry::where('user_id', $id)
            ->where('date',$date)
            ->first();
        
        if ($existingEntry) {
            return response()->json(['error' => 'Cannot clock in today'], 500);
        }
        
        // Create a new time entry for clocking in
        TimeEntry::create([
            'user_id' => $id,
            'clock_in' => now(),
            'date'=>today(),
            'location'=>$request->location

        ]);
dump($id);
dump($request->id);
        // return redirect()->back()->with('success', 'Clocked in successfully.');
        return response()->json('clocked in');
    }

    

    public function clockOut(Request $request)
    {
        $id = null;
        if($request->id){
            $id=$request->id;
        }else {
            $id = auth()->id();
        }
        // Find the user's open time entry
        $entry = TimeEntry::where('user_id', $id)
            ->whereNull('clock_out')
            ->whereNotNull('clock_in')
            ->first();
    
        if (!$entry) {
            return redirect()->back()->with('error', 'You are not currently clocked in.');
        }
    
        // Calculate working hours
        $clockIn = Carbon::parse($entry->clock_in);
        $clockOut = now();
        
        // Calculate the difference between clock in and clock out in minutes
        $minutesDifference = $clockOut->diffInMinutes($clockIn);
        
        // Convert the minutes difference to hours
         // Convert seconds to hours // Convert minutes to hours
        $hours = floor($minutesDifference / 60);
        $minutes = $minutesDifference % 60;
        $timeFormat = sprintf('%02d:%02d:00', $hours, $minutes);
        // Update time entry with clock_out and working_hours
        $entry->update([
            'clock_out' => $clockOut,
            'working_hours' => $timeFormat,
        ]);
    
        return redirect()->back()->with('success', 'Clocked out successfully.');
    }
    

public function checkClockIn(){
    $date = Carbon::now()->format('Y-m-d');

    $existingEntry = TimeEntry::where('user_id', auth()->id())
    ->where('date',$date)
    ->whereNotNull('clock_in')
    ->whereNull('clock_out')
    ->first();
    if($existingEntry){
        return response()->json(
            ['clockedIn' => true,
            'clockInTime' => $existingEntry->clock_in,
            ]
        );
    }else{
        return response()->json(['clockedIn' => false]);
    }
}
public function attendance(){
    $entry = TimeEntry::where('user_id', auth()->id())
    ->whereMonth('date', now()->month)
    ->orderBy('date')
    ->get();
    return response()->json($entry);
}


public function getTimeEntriesByMonth(Request $request)
{$authenticatedUserId = auth()->id();
    $requestedUserId = $request->input('user_id');

    if ($authenticatedUserId != $requestedUserId) {
        // The authenticated user is not authorized to get time entries for another user
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    // Continue with getting time entries logic
    $date = $request->input('month');
    $month = date('Y-m', strtotime($date));

    $timeEntries = TimeEntry::where('date', 'like', "$month%")
    ->where('user_id', $requestedUserId)
    ->orderBy('date')
    ->get();

    return response()->json($timeEntries);

}

public function getTimeEntriesByDate(Request $request){
    // $requestedUserId = $request->input('user_id');
    // dump($requestedUserId);
    // Continue with getting time entries logic
    $date = $request->input('date');
    
    $timeEntries = TimeEntry::where('date', 'like', "$date%")
    ->orderBy('date')
    // ->where('user_id', $requestedUserId)
    ->get();

    return response()->json($timeEntries);
}

public function addTimeEntriesByDate(Request $request){
    $clockedInUsers = [];

foreach ($request->updates as $update) {
    $user_id = $update['user_id'];
    $date = $update['date'];
    $shift = $update['shift'];
    // Check if attendance is already marked for the given user, date, and shift
    $existingAttendance = TimeEntry::where('user_id', $user_id)
        ->where('date', $date)
        ->where('shift_no', $shift)
        ->first();

    // If attendance is not already marked, create a new record
    if (!$existingAttendance) {
        TimeEntry::create([
            'user_id' => $user_id,
            'clock_in' => now(),
            'date' => $date,
            'shift_no' => $shift,
        ]);

        // Log the message
        Log::info("Attendance marked for User ID: $user_id, Date: $date, Shift: $shift");

        $clockedInUsers[] = $user_id; // Track users who have clocked in
    } else {
        // Log the message
        Log::info("Attendance already marked for User ID: $user_id, Date: $date, Shift: $shift");
    }
}

// Update clock_out for the users who have clocked in
TimeEntry::whereIn('user_id', $clockedInUsers)
    ->whereNull('clock_out')
    ->whereNotNull('clock_in')
    ->update(['clock_out' => now()]);

// Redirect with appropriate message
if (!empty($clockedInUsers)) {
    return response()->json('Clocked in successfully.');
} else {
    return response()->json('Attendance already marked for selected shifts.');
}
}  

public function markRestDaysForMonth($nextMonth)
    {
        $officeUsers = User::where('project_id', 1)->get();
        
        User::query()->update(['rest_days'=>5]);
        $firstDayOfMonth = Carbon::parse($nextMonth)->startOfMonth();
        $lastDayOfMonth = Carbon::parse($nextMonth)->endOfMonth();

        for ($date = $firstDayOfMonth; $date->lte($lastDayOfMonth); $date->addDay()) {
            if ($date->dayOfWeek === Carbon::SUNDAY) {
                foreach ($officeUsers as $user) {

                    $existingEntry = TimeEntry::where('user_id', $user->id)
                    ->where('date', $date->toDateString())
                    ->where('remarks', 'rest')
                    ->exists();
                    if(!$existingEntry){
                        TimeEntry::create([
                            'user_id' => $user->id,
                            'date' => $date->toDateString(),
                            'remarks' => 'rest',
                        ]);
                    }

                }
            }

            if ($date->dayOfWeek === Carbon::SATURDAY) {
                foreach ($officeUsers as $user) {

                    $existingEntry = TimeEntry::where('user_id', $user->id)
                    ->where('date', $date->toDateString())
                    ->where('remarks', 'work from home')
                    ->exists();
                    if(!$existingEntry){
                        TimeEntry::create([
                            'user_id' => $user->id,
                            'date' => $date->toDateString(),
                            'remarks' => 'work from home',
                        ]);
                    }

                }
            }
        }

        return 'Rest days marked for the next month.';


    }

    public function markRestForProjectUsers(Request $request){
        foreach( $request->users as $userId){
            TimeEntry::create([
                'user_id' => $userId,
                'date' => today()->toDateString(),
                'remarks' => 'rest',
                'shift_no'=>1
            ]);
            $user = User::find($userId);
            $user->update(['rest_days' => $user->rest_days - 1]);
        }

    
 
        
    }
    function fixRestDays($year, $month)
{
    // Step 1: Count the Sundays in the given month
    $totalSundays = $this->countSundaysInMonth($year,$month);
    // Step 2: Get all users and calculate their adjusted rest_days
    $users = DB::table('users')->get();

    foreach ($users as $user) {
        // Count the "rest" entries in the timeentries table for the user in the specified month
        $restEntriesCount = TimeEntry::where('user_id', $user->id)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->where('remarks', 'rest')
            ->count();
        dump($restEntriesCount);
        // Calculate the new rest_days
        $newRestDays = max(0, $totalSundays - $restEntriesCount);

        // Update the user's rest_days in the database
        DB::table('users')
            ->where('id', $user->id)
            ->update(['rest_days' => $newRestDays]);
    }
}

function countSundaysInMonth($year, $month)
{
    $startOfMonth = Carbon::create($year, $month, 1);
    $endOfMonth = $startOfMonth->copy()->endOfMonth();

    // Find the first Sunday of the month
    $firstSunday = $startOfMonth->copy()->next(Carbon::SUNDAY);

    // If the month starts on a Sunday, adjust
    if ($startOfMonth->isSunday()) {
        $firstSunday = $startOfMonth;
    }

    // Calculate the total number of Sundays
    $totalSundays = 0;
    for ($date = $firstSunday; $date->lte($endOfMonth); $date->addWeek()) {
        $totalSundays++;
    }

    return $totalSundays;
}

    public function markRestForProjectUsersForDate(Request $request){
        $date = Carbon::parse($request->rest_date);

        foreach( $request->users as $userId){
            TimeEntry::create([
                'user_id' => $userId,
                'date' => $date->toDateString(),
                'remarks' => 'rest',
                'shift_no'=>1
            ]);
            $user = User::find($userId);
            $user->update(['rest_days' => $user->rest_days - 1]);
        }

        return response()->json('time entry created');
 
        
    }

    public function markRest(Request $request){
        $user = User::find($request->user);
      if($user->rest_days>0){
          $existingEntry = TimeEntry::where('user_id', $user->id)
                  ->where('date', $request->date)
                  ->where('remarks', 'rest')
                  ->exists();
                  if(!$existingEntry){
          TimeEntry::create([
              'user_id' => $request->user,
              'date' => $request->date,
              'remarks' => 'rest',
              'shift_no'=>1
          ]);
        
          $user->update(['rest_days' => $user->rest_days - 1]);
                  }
                  else{
                     $existingEntry->update([
                  'remarks' => 'rest' // or any other fields that need updating
              ]);
                  }
      }else{
           
              return back()->withErrors('No more rests left');   
      } 
  }


    public function destroy(Request $request){
        $entry = TimeEntry::where('user_id',$request->user)->where('date',$request->date)->first();
       
        $user = User::where('id',$request->user)->first();
        if($request->status === 'rest'){
            $user->update(['rest_days' => $user->rest_days + 1]);
        }
        
        $entry->delete();
        return response()->json('deleted');
    }
    public function bulkDestroy(Request $request)
{
    $users = $request->input('users'); // Expecting an array of user IDs
    $date = $request->input('date');
    $status = $request->input('status');

    if (!is_array($users) || empty($users)) {
        return response()->json(['error' => 'Invalid or empty users list'], 400);
    }

    foreach ($users as $userId) {
        $query = TimeEntry::where('user_id', $userId)->where('date', $date);

        switch ($status) {
            case 'rest':
                $query->where('remarks', 'rest');
                break;
            case 'normal_shift':
                $query->where('shift_no', 1);
                break;
            case 'overtime':
                $query->where('shift_no', 2);
                break;
            default:
                return response()->json(['error' => 'Invalid status provided'], 400);
        }

        $entry = $query->first();

        if ($entry) {
            if ($status === 'rest') {
                // Increment rest days for the user
                $user = User::find($userId);
                if ($user) {
                    $user->increment('rest_days');
                }
            }
            // Delete the entry
            $entry->delete();
        }
    }


    return response()->json(['message' => 'Entries deleted successfully']);
}
}