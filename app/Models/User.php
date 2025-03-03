<?php

namespace App\Models;
use App\Models\Role;
use App\Models\TimeEntry;
use App\Models\Project;
use App\Models\Area;
use App\Models\Leave;
use App\Models\Salary;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    

    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable, \Illuminate\Notifications\HasDatabaseNotifications;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'password',
        'project_id',
        'area_id',
        'reporting_manager_id',
        'designation',
        'domain',
        'joining_date',
        'mobile_no',
        'address',
        'dob',
        'emergency_no',
        'highest_qualification',
        'adhaar_no',
        'pan_no',
        'bank_name',
        'account_no',
        'account_holder_name',
        'ifsc',
        'uan',
        'esic',
        'salary',
        'manday',
        'rest_days',
        'paid_leaves',
        'sick_leaves',
        'casual_leaves',
        'profile_picture',
        'assigned_project',
        'assigned_area'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    


    public function roles()
{
    return $this->belongsToMany(Role::class);
}
public function hasRole(string $role): bool
{
    return $this->roles->contains('role', $role);
}
public function timeEntries()
{
    return $this->hasMany(TimeEntry::class);
}
public function project()
    {
        return $this->belongsTo(Project::class);
    }

public function areas()
{
    return $this->belongsToMany(Area::class);
}
public function salaries()
{
    return $this->hasMany(Salary::class, 'employee_id', 'employee_id'); // Match the correct foreign key
}

public function area(){
    return $this->belongsTo(Area::class);
}

public function reportingManagers()
{
    return $this->belongsToMany(User::class, 'reporting_manager_user', 'user_id', 'reporting_manager_id');
}

public function leaves()
{
    return $this->hasMany(Leave::class);
}

protected $dispatchesEvents = [
    'creating' => \App\Events\UserCreating::class,
];
}
