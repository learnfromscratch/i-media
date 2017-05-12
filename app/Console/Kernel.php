<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use Carbon\Carbon;
use Mail;
use App\Mail\Abonnement;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendNewsletters::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*$schedule->command('email:newsletter')
                 ->everyMinute();
                 
        $schedule->call(function() {
            $users = User::where('role', 'client')->get();
            foreach ($users as $user) {
                if (Carbon::parse($user->abonnement->end_date)->diffInDays(Carbon::now()) < 10)
                {
                    Mail::to($user)->send(new Abonnement());
                }
            }
        })->everyMinute();*/
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
