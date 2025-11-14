<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;

class WelcomeController extends Controller
{
    public function index()
    {
        $addresses = Address::orderBy('name')->get();

        return view('car-rental-welcome', compact('addresses'));
    }

    // public function preview(Request $request)
    // {
    //     // Store form data temporarily in session
    //     session([
    //         'booking_data' => $request->only([
    //             'address',
    //             'pickup_date',
    //             'pickup_time',
    //             'return_date',
    //             'return_time',
    //             'age',
    //         ]),
    //     ]);

    //     // Redirect to next step (if logged in, go to booking; else to login)
    //     if (auth()->check()) {
    //         return redirect()->route('booking.continue');
    //     } else {
    //         return redirect()->route('login')->with('info', 'Please log in to continue your booking.');
    //     }
    // }
}
