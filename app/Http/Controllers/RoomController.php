<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    public function index()
    {
        return view('room.index', [
            "rooms" => Room::all(),
            'name' => 'Kamar'
        ]);
    }

    public function detail(Room $room)
    {
        return view('room.detailroom', [
            "room" => $room,
            'name' => 'Detail Kamar'
        ]);
    }

    
}
