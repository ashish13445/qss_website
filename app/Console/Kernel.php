<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\TimeEntryController;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Get the first day of the current month
            $firstDayOfMonth = now()->startOfMonth();
    
            // Call the markRestDaysForMonth method for the current month
            (new TimeEntryController())->markRestDaysForMonth($firstDayOfMonth);
        })->monthlyOn(1, '11:52'); // Run on the last day of each month at 11:59 PM
    }
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
