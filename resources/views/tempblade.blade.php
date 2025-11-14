@extends('layouts.app')

@section('title', 'Booking Confirmation')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl pt-10 p-10 mt-3 border border-gray-200">
    <!-- Header -->
    <div class="mb-8 border-b pb-4">
        <h2 class="text-3xl font-bold text-gray-800">
            <i class="fa-solid fa-circle-check text-indigo-600 mr-2"></i>
            Final Booking Summary
        </h2>
        <p class="text-gray-500 mt-1">Review your selected car and total payment before confirming.</p>
    </div>

    <!-- Booking Details -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700 mb-10">
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Name</h3>
            <p class="text-lg font-medium text-gray-800">John Doe</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Email Address</h3>
            <p class="text-lg font-medium text-gray-800">johndoe@gmail.com</p>
        </div>

        <div class="col-span-1 sm:col-span-2 flex items-center">
            <input type="checkbox" id="useCredentials" name="useCredentials" checked
                class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
            <label for="useCredentials" class="ml-3 text-gray-700 text-sm font-medium">
                Use my own credentials
            </label>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pick-up Address</h3>
            <p class="text-lg font-medium text-gray-800">Pooc Occidental, Tubigon, Bohol</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Driver Age</h3>
            <p class="text-lg font-medium text-gray-800">27</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pickup</h3>
            <p class="text-lg font-medium text-gray-800">2025-11-15 at 09:00 AM</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Return</h3>
            <p class="text-lg font-medium text-gray-800">2025-11-18 at 09:00 AM</p>
        </div>
    </div>

    <!-- Selected Car -->
    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 mb-10">
        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <i class="fa-solid fa-car-side text-indigo-600 mr-2"></i> Selected Car
        </h3>

        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <img src=""
                alt="Toyota Vios"
                class="w-full sm:w-48 h-32 object-cover rounded-lg border border-gray-300 shadow-sm">

            <div class="flex-1 space-y-1">
                <h4 class="text-lg font-semibold text-gray-900">Toyota Vios (2022)</h4>
                <p class="text-gray-600 text-sm">Sedan • Manual</p>
                <p class="text-gray-800 font-medium mt-2">₱1,800.00 / day</p>
            </div>
        </div>
    </div>

    <!-- Payment Breakdown -->
    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 mb-10">
        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <i class="fa-solid fa-wallet text-indigo-600 mr-2"></i> Payment Breakdown
        </h3>

        <ul class="space-y-3 text-gray-700">
            <li class="flex justify-between">
                <span>Car Subtotal (3 days):</span>
                <span class="font-medium">₱5,400.00</span>
            </li>
            <li class="flex justify-between">
                <span>Extras:</span>
                <span class="font-medium">₱0.00</span>
            </li>
            <li class="flex justify-between border-t pt-3 text-lg font-semibold text-indigo-700">
                <span>Total:</span>
                <span>₱5,400.00</span>
            </li>
        </ul>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
        <a href="#" 
           class="px-5 py-3 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-200 transition w-full sm:w-auto text-center">
            <i class="fa-solid fa-arrow-left mr-2"></i> Back to Cars
        </a>

        <button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition w-full sm:w-auto">
            <i class="fa-solid fa-check mr-2"></i> Book Now!
        </button>
    </div>
</div>
@endsection
