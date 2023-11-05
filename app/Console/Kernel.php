<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('kobiyim::save-backup')->dailyAt('12:45');
        $schedule->command('kobiyim::upload-backup')->dailyAt('12:45');

        $schedule->command('kobiyim::save-backup')->dailyAt('19:00');
        $schedule->command('kobiyim::upload-backup')->dailyAt('19:00');

        $schedule->command('kobiyim::clean-backup')->weeklyOn(7, '20:00');
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
