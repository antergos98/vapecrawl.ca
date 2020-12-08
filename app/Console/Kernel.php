<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('import:products')
            ->timezone('America/Toronto')
            ->dailyAt('02:00')
            ->thenPing('https://hc-ping.com/f22b2536-7af1-4ac9-82ad-d998e2eabfb5');

        $schedule
            ->command('snapshot:create ' . now()->format('Y/m/d'))
            ->environments('production')
            ->timezone('America/Toronto')
            ->dailyAt('00:00')
            ->thenPing('https://hc-ping.com/78aed347-1827-4b0f-a66a-fe9555b7f41b');

        $schedule->command('destroy:expired:coupons')
            ->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
