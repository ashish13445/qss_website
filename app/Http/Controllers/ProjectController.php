<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $projects = Project::with('users.roles')->get();
        $projects = Project::with('areas.users')->get();
        return response()->json($projects);
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
        $project = Project::create($request->all());
        return response()->json(['project' => $project]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and update the user
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return response()->json(['project' => $project]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json('deleted');
    }
    public function getUser($id){
        $project = Project::findOrFail($id);
        $usersWithAttendance = $project->users()
        ->with(['roles', 'timeEntries' => function ($query) {
            $query->whereYear('date', now()->year)
                  ->whereMonth('date', now()->month);
                  
        }])
        ->get();
        return response()->json($usersWithAttendance);
    }
    public function getProject($id){
        $project = Project::findOrFail($id);
        return response()->json($project);
    }
}
