<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Payment;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;
use Illuminate\Queue\Jobs\RedisJob;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Payment::query()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function detail(string $id)
    {
        $order =  Payment::where('id', $id)->first();
        return view('orders.detail', compact('order'));
    }

    public function update(Payment $payment, Request $request)
    {
        $rand = str()->random(5);
        if ($request->payment_status == 'Confirmed') {


            $room = Room::where('id', $payment->reservation->room->id);
            $payment->update([
                'payment_status' => "Confirmed",
                'code_payment_success' => $rand
            ]);

            $room->update([
                'status' => 'Booked'
            ]);
        } else if ($request->payment_status == 'Check_in') {
            $room = Room::where('id', $payment->reservation->room->id);
            $payment->update([
                'payment_status' => "Check-In",
                'code_payment_success' => $rand
            ]);

            $room->update([
                'status' => 'Booked'
            ]);
        } else if ($request->payment_status == 'Check_out') {
            $room = Room::where('id', $payment->reservation->room->id);
            $payment->update([
                'payment_status' => "Check-Out",
                'code_payment_success' => $rand
            ]);

            $room->update([
                'status' => 'Tersedia'
            ]);
        } else {
            $payment->update([
                'payment_status' => "Rejected",

            ]);
        }



        return redirect('/orders');
    }
}
