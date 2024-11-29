<?php

namespace App\Http\Controllers\Auth;
use App\Events\UserCreating;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
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
            'project_id'=> 1,
            'area_id'=>1,
            'designation'=>$request->designation,
            'domain'=>$request->domain,
            'joining_date'=>$request->joining_date,
            'rest_days' => $restDays
        ]);

        event(new Registered($user));
        event(new UserCreating($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
