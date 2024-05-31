<?php

namespace App\Console\Commands;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateExpiredDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-expired-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
     
        Log::info('tes');
        $rooms = Room::with('user')->get();
            foreach($rooms as $room){
                $expired_date = Carbon::parse($room->end_date)->addDay();
                if($expired_date->isPast()){
                    $user = User::find($room->user_id);
                    $user->update(['is_active' => false]);
                    $room->update(['user_id' => null, 'start_date'=> null, 'end_date' => null]);
                }
            }
    }
}
