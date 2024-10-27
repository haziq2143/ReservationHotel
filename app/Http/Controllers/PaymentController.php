<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::join('reservations', 'payments.reservation_id', '=', 'reservations.id')
            ->where('reservations.user_id', Auth::user()->id)
            ->select('payments.id as payment_id', 'reservations.id as reservation_id', 'payments.*')
            ->get();

        return view('payments.index', compact('payments'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'amount' => 'required',
            'payment_method' => 'required|string',
            'reservation_id' => 'required'
        ]);

        $validated['payment_status'] = "Unpaid";


        Payment::create($validated);
        return redirect('/payments');
    }

    public function detail(string $id)
    {
        $payment = Payment::where('id', $id)->first();
        return view('payments.detail', compact('payment'));
    }

    public function update(Payment $payment, Request $request)
    {
        $validated = $request->validate([
            'payment_proof'     => 'mimes:jpeg,jpg,png',
        ]);

        if ($request->file('payment_proof')) {
            $validated['payment_proof'] = $request->file('payment_proof');
            $path = $validated['payment_proof']->store('public/paymentProof');
            Storage::delete('public/posts/' . $path);

            $payment->update([
                'payment_proof' =>  $path,
                'payment_status' => "Pending",
                'paid_at' => Carbon::now()
            ]);
        }

        return redirect('/payments');
    }

    public function destroy($id)
    {
        $payment = Payment::where('reservation_id', $id)->first();
        $reservation = Reservation::where('id', $id)->first();
        $payment->delete();
        $reservation->delete();

        return redirect('/payments');
    }
}
