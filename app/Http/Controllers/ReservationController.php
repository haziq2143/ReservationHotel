<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Payment;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class ReservationController extends Controller
{
    public function booking($roomNumber)
    {
        $room = Room::where('room_number', $roomNumber)->first();
        return view('reservations.booking', compact('room'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date'
        ]);
        $room = Room::where('room_number', $request->room_number)->first();
        $validated['room_id'] = $room->id;
        $validated['user_id'] = Auth::user()->id;

        $reservation = Reservation::create($validated);

        return redirect('/reservations/payment/' . $reservation->id);
    }

    public function payment($id)
    {
        $reservation = Reservation::where('id', $id)->first();
        $checkInDate = Carbon::parse($reservation->check_in);
        $checkOutDate = Carbon::parse($reservation->check_out);

        $duration = $checkInDate->diffInDays($checkOutDate);
        $paymentExists = Payment::where('reservation_id', $reservation->id)->exists();

        if (!$paymentExists) {
            return view('reservations.payment', compact('reservation', 'duration'));
        } else {
            return abort(404);
        }
    }
}
