<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function startBooking(Request $request)
    {
        session([
            'pending_booking' => $request->only([
                'address', 'age', 'pickup_date', 'pickup_time', 'return_date', 'return_time'
            ])
        ]);

        if (!Auth::check()) {
            return redirect()->guest(route('login'))->with('message', 'Please log in to continue your booking.');
        }

        return redirect()->route('booking.continue');
    }

    public function continueBooking(Request $request)
    {
        $form = session('_old_input', []);

        if (empty($form)) {
            return redirect()->route('home')->with('error', 'Please start a booking first.');
        }

        return view('booking-process', ['form' => $form]);
    }

    public function finalStep(Request $request, Car $car)
    {
        $form = session('pending_booking');

        if (!$form) {
            return redirect()->route('home')->with('error', 'Please start a booking first.');
        }

        $pickup = Carbon::parse($form['pickup_date'] . ' ' . $form['pickup_time']);
        $return = Carbon::parse($form['return_date'] . ' ' . $form['return_time']);
        $durationHours = $pickup->diffInHours($return);
        $rentalDays = ceil($durationHours / 24);

        $carSubtotal = $car->daily_rate * $rentalDays;
        $extrasSubtotal = 0;
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

        session()->forget('pending_booking');

        return redirect()->route('home')->with('success', 'Booking submitted successfully! Await confirmation.');
    }
}