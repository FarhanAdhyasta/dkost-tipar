<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.transaksi.index',[
            'orders' => Order::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($order)
    {
        $order = Order::where('id',$order)->first();
        return view('dashboard.transaksi.show',[
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($order)
    {
        $order = Order::where('id',$order)->first();
        return view('dashboard.transaksi.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $order)
    {
        $order = Order::where('id',$order)->first();
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        // Dapatkan data kamar terkait dengan order
        $room = $order->room;
    
        // Jika ada kamar terkait, perbarui start_date dan end_date pada kamar juga
        if ($room) {
            $room->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        }
    
        // Perbarui start_date dan end_date pada transaksi
        $order->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    
        return redirect('/dashboard/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order)
    {
        $order = Order::where('id',$order)->first();
        $room = $order->room;
        $user = $order->user;

        if ($room) {
            // Hapus relasi user_id, start_date, dan end_date pada room
            $room->update([
                'user_id' => null,
                'start_date' => null,
                'end_date' => null,
            ]);
        }

        if ($user) {
            // Mengubah is_active menjadi false pada user terkait
            $user->update([
                'is_active' => false,
            ]);
        }

        $order->delete();
        return redirect('/dashboard/transaksi');
    }
}
