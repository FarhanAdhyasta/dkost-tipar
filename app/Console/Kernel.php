<?php

namespace App\Console;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // Tambahkan tugas yang ingin dijalankan secara berkala di sini
        $schedule->call(function () {
            $rooms = Room::with('user')->get();
            foreach($rooms as $room){
                $expired_date = Carbon::parse($room->end_date)->addDay();
                if($expired_date->isPast()){
                    $user = User::find($room->user_id);
                    $user->update(['is_active' => false]);
                    $room->update(['user_id' => null, 'start_date'=> null, 'end_date' => null]);
                }
            }
        })->everyMinute(); // Tugas ini akan dijalankan setiap hari
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
