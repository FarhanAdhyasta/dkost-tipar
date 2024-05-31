<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                return view('home.homepage', [
                    'name' => 'Beranda'
                ]); //nanti diganti halaman profil kalo udah ada, sementara ngereturn beranda
            } elseif ($usertype == 'admin') {
                $userCount = User::count();
                $roomCount = Room::count();
                $roomfillCount = Room::whereNotNull('user_id')->orWhere('status', 'Tidak Tersedia')->count();
                $orders = Order::latest()->paginate(6);

                // Hanya menghitung total price dari orders yang statusnya 'paid'
                $totalPrice = $orders->filter(function ($order) {
                    return $order->status === 'paid';
                })->sum(function ($order) {
                    return $order->room->price;
                });

                return view('dashboard.index', [
                    "orders" => $orders,
                    "usercounts" => $userCount,
                    "roomcounts" => $roomCount,
                    "roomfill" => $roomfillCount,
                    "totalPrice" => $totalPrice
                ]);
            } else {
                return redirect()->back();
            }
        }
    }

    public function beranda()
    {
        return view('home.homepage', [
            'name' => 'Beranda'
        ]);
    }

    public function homepage()
    {
        return view('home.homepage', [
            'name' => 'Beranda'
        ]);
    }

    public function tentang()
    {
        return view('tentang.index', [
            'name' => 'Tentang'
        ]);
    }

    public function riwayat()
    {
        $orders = Order::where('user_id', Auth::user()->id)
                       ->orderBy('created_at', 'desc')
                       ->get();

        return view('profile.riwayat', compact('orders'), [
            'name' => 'Riwayat'
        ]);
    }
}