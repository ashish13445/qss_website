<?php

namespace App\Listeners;
use App\Models\Role;
use App\Events\UserCreating;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignDefaultRole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreating $event): void
    {
        $defaultRole = 'user';
        $event->user->created(function ($user) use ($defaultRole) {
            $role = Role::where('role', $defaultRole)->first();

            if ($role) {
                $user->roles()->attach($role->id);
            }
        });
    }
}
