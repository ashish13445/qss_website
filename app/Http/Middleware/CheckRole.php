<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
          // Check if the user is authenticated
          if (Auth::check()) {
            $user = Auth::user();
            // dump($user->roles);
            // Check if the user has at least one of the required roles
            foreach ($roles as $role) {
                if ($user->roles->contains('role', $role)) {
                    return $next($request);
                }
            }
        }

        // Redirect or return a forbidden response if the user doesn't have the necessary role
        return redirect('/')->with('error', 'Unauthorized. You do not have the necessary role.');
        // Alternatively, you can return a response like abort(403) for a forbidden response.
    }
}
