<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index($slug)
    {
        
        $room = Room::where('slug', $slug)->first();
        return view('transaction.index', compact('room'), [
            'name' => 'Transaksi'
        ]);
    }

    public function order(Request $request)
    {
        $room = json_decode($request->room);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $start = Carbon::createFromFormat('d/m/Y', $request->start_date);
        $formattedStartDate = $start->format('Y-m-d');
        $end = Carbon::createFromFormat('d/m/Y', $request->end_date);
        $formattedEndDate = $end->format('Y-m-d');

        $order = Order::create([
            'code' => Str::uuid(),
            'user_id' => Auth::user()->id,
            'room_id' => $room->id,
            'status' => 'unpaid',
            'total' => $room->price,
            'start_date' => $formattedStartDate,
            'end_date' => $formattedEndDate,
        ]);

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->code,
                'gross_amount' => $order->total,
            ),
            'item_details' => [['id' => $room->id, 'name' => $room->nameroom, 'quantity' => 1, 'price' => $room->price, 'subtotal' => $room->price]],
            'customer_details' => array( 
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone_number,
                'address' => Auth::user()->address,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $order->update(['snap_token' => $snapToken]);

        return response()->json(['token' => $snapToken]);
    }


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'settlement'){
                $order = Order::with('room')->where('code', $request->order_id)->first();
                $order->update(['status' => 'paid']);
                $user = User::find($order->user_id);
                $user->update(['is_active' => true]);
                try{
                    $order->room->update(['user_id' => $order->user_id, 'start_date' => $order->start_date, 'end_date' => $order->end_date]);
                }catch(Exeption $e){
                    Log::info(e.getMessage());
                }
            }
        }
    }
}
