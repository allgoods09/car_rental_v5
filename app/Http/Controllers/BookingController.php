<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Car;

class BookingController extends Controller
{
    public function startBooking(Request $request)
    {
        if (!Auth::check()) {
    session([
        'pending_booking' => $request->only([
            'address', 'age', 'pickup_date', 'pickup_time', 'return_date', 'return_time'
        ])
    ]);

    // 🟢 Use redirect()->guest() so Laravel remembers the "intended" URL
    return redirect()->guest(route('login'))->with('message', 'Please log in to continue your booking.');
}

        // Authenticated users can proceed normally
        return redirect()->route('booking.continue')->withInput();
    }

    public function finalStep(Request $request, Car $car)
    {
        // Retrieve booking details from session
        $form = session('pending_booking');

        if (!$form) {
            return redirect()->route('home')->with('error', 'Please start a booking first.');
        }

        // Calculate duration and amount
        $pickup = Carbon::parse($form['pickup_date'] . ' ' . $form['pickup_time']);
        $return = Carbon::parse($form['return_date'] . ' ' . $form['return_time']);
        $durationHours = $pickup->diffInHours($return);

        // Convert to days (if exceeds 24 hrs or has remainder, add 1)
        $rentalDays = ceil($durationHours / 24);

        $carSubtotal = $car->daily_rate * $rentalDays;
        $extrasSubtotal = 0; // You can modify this if extras exist
        $totalAmount = $carSubtotal + $extrasSubtotal;

        return view('booking-final', [
            'form' => $form,
            'car' => $car,
            'rentalDays' => $rentalDays,
            'carSubtotal' => $carSubtotal,
            'extrasSubtotal' => $extrasSubtotal,
            'totalAmount' => $totalAmount,
        ]);
    }

    public function confirmBooking(Request $request)
    {
        $form = session('pending_booking');
        $car = Car::findOrFail($request->car_id);

        $pickup = Carbon::parse($form['pickup_date'] . ' ' . $form['pickup_time']);
        $return = Carbon::parse($form['return_date'] . ' ' . $form['return_time']);
        $rentalDays = ceil($pickup->diffInHours($return) / 24);

        $carSubtotal = $car->daily_rate * $rentalDays;
        $extrasSubtotal = 0;
        $totalAmount = $carSubtotal + $extrasSubtotal;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'driver_age' => $form['age'],
            'pickup_datetime' => $pickup,
            'return_datetime' => $return,
            'rental_days' => $rentalDays,
            'car_id' => $car->id,
            'usage_area_data' => json_encode(['address' => $form['address']]),
            'car_subtotal' => $carSubtotal,
            'extras_subtotal' => $extrasSubtotal,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        // Clear session
        session()->forget('pending_booking');

        return redirect()->route('home')->with('success', 'Booking submitted successfully! Await confirmation.');
    }
}
