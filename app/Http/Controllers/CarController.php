<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Addresses;

class CarController extends Controller
{
    public function index()
    {
        // Only show available cars
        $addresses = Addresses::all();

        $cars = Car::where('status', 'available')->latest()->get();

        return view('car-rental-welcome', compact('cars', 'addresses'));
    }
}
