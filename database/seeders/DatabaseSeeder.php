<?php

namespace Database\Seeders;
use App\Models\Project;
use App\Models\Area;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use App\Events\UserCreating;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\TimeEntryController;
use Illuminate\Support\Facades\DB;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $projects = [
            ['title'=>'OFFICE'
        ],
            ['title'=>'MCL']
    ];
        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        $area = [
            ['name'=>'Noida',
            'project_id'=>'1'
        ],
            ['name'=>'IB Valley',
            'project_id'=>'2'],
            ['name'=>'Lakhanpur',
            'project_id'=>'2']
    ];
        foreach ($area as $areaData) {
            $project = Project::findOrFail(1);
            $area = new Area($areaData);
            
            // Assuming a one-to-many relationship
            $project->areas()->save($area);
        }


        $roles = [
            ['role'=>'admin'
        ],
            ['role'=>'user']
    ];
        foreach ($roles as $roleData) {
            Role::create($roleData);
        }

        $user = [
            [
            'employee_id'=>"QSSPL/001",
            'name' => 'ASMIT AGRAWAL',
            'email' => 'admin@qssindia.in',
            'password' => Hash::make('password'),
            'project_id'=> 1,
            'area_id'=>1,
            'designation'=>'ADMIN',
            'domain'=>'SALES & FINANCE',
            'joining_date'=>today(),
            'rest_days'=> 4,
            ],
            [
                'employee_id'=>"QSSPL/011",
                'name' => 'ASHISH JAIN',
                'email' => 'ashish.jain@qssindia.in',
                'password' => Hash::make('password'),
                'project_id'=> 1,
                'area_id'=>1,
                'designation'=>'ADMIN',
                'domain'=>'IT',
                'joining_date'=>today(),
                'rest_days'=> 4,
            ],

            ];

            foreach ($user as $userData) {
                
                $this_user = User::create($userData);
                $timeEntryController = new TimeEntryController();
    $nextMonth = now()->startOfMonth(); // Get the first day of the next month
   $timeEntryController->markRestDaysForMonth($nextMonth);
                event(new Registered($this_user));
        event(new UserCreating($this_user));
            }

$users = User::all();

        // Define your logic for assigning reporting managers
        // Example: Assign every user to a random reporting manager
        foreach ($users as $user) {
            // Fetch a random subset of reporting managers

            // Attach the reporting managers to the user
                DB::table('reporting_manager_user')->insert([
                    'user_id' => $user->id,
                    'reporting_manager_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }

    }
}
