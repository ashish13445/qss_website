<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TimeEntryController;
use App\Models\User;
use App\Models\Project;

use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Events\UserCreating;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Shuchkin\SimpleXLSX;

class UserController extends Controller
{
    public function showUploadForm()
    {
        return view('user.upload'); // This is the view where users can upload the file
    }
    /**
     * Display a listing of the resource.
     */
    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    $xlsx = SimpleXLSX::parse($request->file('file'));

    foreach ($xlsx->rows() as $row) {
        // Check if a user with this employee_id already exists
        $user = User::where('employee_id', $row[0])->first();

        if ($user) {
            // Update the existing user
            $user->update([
                'name' => $row[1],
                'email' => $row[2],
                'password' => bcrypt('password'),
                'project_id' => $row[3] ?? 1,
                'area_id' => $row[4] ?? null,
                'reporting_manager_ids' => $row[5] ?? null,
                'designation' => $row[6],
                'domain' => $row[7],
                'joining_date' => $row[8],
                'mobile_no' => $row[9],
                'address' => $row[10],
                'dob' => $row[11],
                'emergency_no' => $row[12],
                'highest_qualification' => $row[13],
                'adhaar_no' => $row[14],
                'pan_no' => $row[15],
                'bank_name' => $row[16],
                'account_no' => $row[17],
                'account_holder_name' => $row[18],
                'ifsc' => $row[19],
                'uan' => $row[20],
                'esic' => $row[21],
                'salary' => $row[22],
                'manday' => $row[23],
                'rest_days' => $row[24],
                'paid_leaves' => $row[25],
                'sick_leaves' => $row[26],
                'casual_leaves' => $row[27]
            ]);
        } else {
            // Create a new user
            User::create([
                'employee_id' => $row[0],
                'name' => $row[1],
                'email' => $row[2],
                'password' => bcrypt('password'),
                'project_id' => $row[3] ?? 1,
                'area_id' => $row[4] ?? null,
                'reporting_manager_ids' => $row[5] ?? null,
                'assigned_project' => 0,
                'assigned_area' => null,
                'designation' => $row[6],
                'domain' => $row[7],
                'joining_date' => $row[8],
                'mobile_no' => $row[9],
                'address' => $row[10],
                'dob' => $row[11],
                'emergency_no' => $row[12],
                'highest_qualification' => $row[13],
                'adhaar_no' => $row[14],
                'pan_no' => $row[15],
                'bank_name' => $row[16],
                'account_no' => $row[17],
                'account_holder_name' => $row[18],
                'ifsc' => $row[19],
                'uan' => $row[20],
                'esic' => $row[21],
                'salary' => $row[22],
                'manday' => $row[23],
                'rest_days' => $row[24],
                'paid_leaves' => $row[25],
                'sick_leaves' => $row[26],
                'casual_leaves' => $row[27]
            ]);
        }
    }

    return back()->with('success', 'Users have been imported successfully!');
}
    
    public function store(Request $request,$project_id,$area_id)
    {
        $request->validate([
            'employee_id'=>'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'designation'=>'required',
            'domain'=>'required',
            'joining_date'=>'required'
        ]);
        $joiningDayOfWeek = date('w', strtotime($request->joining_date));

        $sundaysPassed = floor(date('d', strtotime($request->joining_date)) / 7);
        
        if ($joiningDayOfWeek == 0) {
            $sundaysPassed--;
        }
        $restDays = 4 - $sundaysPassed;

        $restDays = max(0, min(4, $restDays));
        $user = User::create([
            'employee_id'=>$request->employee_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'project_id'=> $request->project_id,
            'area_id'=>$request->area_id,
            'designation'=>$request->designation,
            'domain'=>$request->domain,
            'joining_date'=>$request->joining_date,
            'rest_days'=> $restDays,
            
        ]);
        $timeEntryController = new TimeEntryController();
    $nextMonth = now()->startOfMonth(); // Get the first day of the next month
   $timeEntryController->markRestDaysForMonth($nextMonth);

        event(new Registered($user));
        event(new UserCreating($user));
     
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);
    }
    
    public function update(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
       
            // Other user attributes...
            'reporting_manager_ids' => 'nullable|array',
            'reporting_manager_ids.*' => 'exists:users,id',
        ]);
    
        // Find the user
        $user = User::findOrFail($request->id);
    
        // Update user attributes (except reporting_manager_ids)
        $user->update($request->except('reporting_manager_ids'));
    
        // Update reporting manager IDs if provided
        if (isset($validated['reporting_manager_ids'])) {
            $user->reportingManagers()->sync($validated['reporting_manager_ids']);
        }
        return response()->json(['user' => $user, 'message' => 'User updated successfully.']);
    }
    
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->leaves()->delete();
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function viewAllUsers()
    {
        // Use the CheckRole middleware to ensure the user has the 'admin' role
        $users = Project::with('areas.users.timeEntries')->get(); // Paginate with 10 per page
        dump($users);
        return response()->json($users);
       
     
    }

    public function updateRole(Request $request)
    {
        try {
            // Find the user
            $user = User::findOrFail($request->user_id);

            // Sync the roles for the user
            $user->roles()->sync($request->role_id);

            return response()->json(['message' => 'User roles updated successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => 'Failed to update user roles'], 500);
        }
    }

    public function getUser($id){
                $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function getNextEvents()
    {
        // Retrieve users whose birthday is next
        $currentMonth = Carbon::now()->month;
        $currentDay = Carbon::now()->day;
        // Retrieve all users whose birthday is in the current month
        $birthdays = User::where('project_id',1)
        ->whereMonth('dob', $currentMonth)
        ->whereDay('dob', '>=', $currentDay)
            ->orderByRaw('DAY(dob) ASC')
            ->get();

        // Retrieve all users whose work anniversary is in the current month
        $anniversaries = User::where('project_id',1)
        ->whereMonth('joining_date', $currentMonth)
        ->whereDay('joining_date', '>=', $currentDay)
            ->orderByRaw('DAY(joining_date) ASC')
            ->get();

        return [
            'birthdays' => $birthdays,
            'anniversaries' => $anniversaries
        ];
    }
    public function salary(){
        return Inertia::render('Salary/Index', [
            'auth' => [
                'user' => Auth::user(), // Assuming you want to pass the authenticated user
            ],
        ]);
    }
}
