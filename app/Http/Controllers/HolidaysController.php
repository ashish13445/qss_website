<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Holiday;
use App\Models\TimeEntry;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Holidays/Index', [
            'auth' => [
                'user' => Auth::user(), // Assuming you want to pass the authenticated user
            ],
        ]);
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
    {    $request->validate([
        'date' => 'required|date|unique:holidays,date',
        // Add other validation rules as needed
        ]);
        $holiday = Holiday::create(
            [
                'name'=>$request->name,
                'date'=>$request->date
            ]
        );
        $users = User::where('project_id',1)->get();
        foreach($users as $user){
            TimeEntry::create([
                'user_id' => $user->id,
                'date' => $request->date,
                // Set clock_in and clock_out to null to represent a leave day
                'clock_in' => null,
                'clock_out' => null,
                'remarks'=>'holiday'
                // Optionally, you can set additional fields such as 'status' or 'remarks' here
            ]);
        }
        
        return response()->json(['holiday' => $holiday]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getHoliday(){
        $holiday  = Holiday::all();
        return response()->json($holiday);
    }
}
