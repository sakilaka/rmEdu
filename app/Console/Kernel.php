<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function(){
            Log::info("Working");
        })->everyMinute();
         $schedule->command('queue:restart')
        ->everyFiveMinutes();
        $schedule->command('queue:work')
        ->everyFiveMinutes()
        ->withoutOverlapping()
        ->sendOutputTo(storage_path() . '/logs/queue-jobs.log');
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
