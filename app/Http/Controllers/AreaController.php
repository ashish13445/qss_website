<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $area = new Area($request->all());
        
        // Assuming a one-to-many relationship
        $project->areas()->save($area);
        
        return response()->json(['area' => $area]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->update($request->all());
        return response()->json(['area' => $area]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        return response()->json('deleted');
    }
    public function getUser($id,Request $request){
        $today = Carbon::today();
        $area = Area::findOrFail($id);
        $usersWithAttendance = $area->users()
        ->with(['roles','project' ,'area','reportingManagers','timeEntries' => function ($query) {
            $query->whereYear('date', now()->year)
                //   ->whereMonth('date', now()->month)
                  ->orderBy('date');
        }])
        ->paginate(500);

        $presentUsers = $usersWithAttendance->flatMap(function ($user) use ($today) {
            $attendanceToday = $user->timeEntries->filter(function ($entry) use ($today) {
                return Carbon::parse($entry->date)->isToday() && $entry->remarks === 'present' && ($entry->shift_no== 1 || $entry->shift_no == null);
            });
            return $attendanceToday->isNotEmpty() ? $attendanceToday : [];
        });
        $restUsers = $usersWithAttendance->flatMap(function ($user) use ($today) {
            $attendanceToday = $user->timeEntries->filter(function ($entry) use ($today) {
                return Carbon::parse($entry->date)->isToday() && $entry->remarks === 'rest';
            });
            return $attendanceToday->isNotEmpty() ? $attendanceToday : [];
        });
        $overtimeUsers = $usersWithAttendance->flatMap(function ($user) use ($today) {
            $attendanceToday = $user->timeEntries->filter(function ($entry) use ($today) {
                return Carbon::parse($entry->date)->isToday() && $entry->remarks === 'present' && ($entry->shift_no== 2 || $entry->shift_no == 3);
            });
            return $attendanceToday->isNotEmpty() ? $attendanceToday : [];
        });
    
        // Return users with attendance records and present users for today separately
        return response()->json([
            'usersWithAttendance' => $usersWithAttendance,
            'presentUsersToday' => $presentUsers,
            'restUsersToday'=> $restUsers,
            'overtimeUsersToday' =>$overtimeUsers
        ]);
    }

    public function getAreas($id){
        $project = Project::findOrFail($id);
        $areas = $project->areas;
        return response()->json($areas);

    }
}
