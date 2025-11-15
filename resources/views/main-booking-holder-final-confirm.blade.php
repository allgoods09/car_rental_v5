@extends('layouts.app')

@section('title', 'Confirm Your Payment')

@section('content')
    @php
    if(request()->has('name')) {
        $bookings = session('bookings', []); // get existing array or empty
        $bookings[] = [
            'name' => request('name'),
            'email' => request('email'),
            'address' => request('address'),
            'driver_age' => request('driver_age'),
            'pickup_date' => request('pickup_date'),
            'pickup_time' => request('pickup_time'),
            'return_date' => request('return_date'),
            'return_time' => request('return_time'),
        ];
        session(['bookings' => $bookings]);
    }
    @endphp
    <div class="max-w-3xl mx-auto bg-indigo-900 shadow-xl rounded-2xl p-10 mt-20 text-center">
        <!-- Success Icon -->
        <div class="flex justify-center mb-6">
            <div class="bg-green-100 text-green-600 p-4 rounded-full">
                <i class="fa-solid fa-check text-3xl"></i>
            </div>
        </div>

        <!-- Header -->
        <h2 class="text-3xl font-bold text-gray-100 mb-3">Booking Successful!</h2>
        <p class="text-gray-300 mb-8 text-lg">
            Please wait for a call from our customer service team to finalize your booking details.
        </p>

        <!-- Booking Summary (Optional Static Info) -->
        <div class="bg-gray-300 rounded-lg p-6 border border-gray-200 mb-8 text-left max-w-md mx-auto">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Booking Reference</h3>
            <p class="text-lg font-medium text-gray-800 mb-3">#BK-20251115-001</p>

            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Estimated Total</h3>
            <p class="text-lg font-medium text-gray-800">₱0.00</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center space-x-4">
            <a href="{{ route('home') }}"
            class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">
            <i class="fa-solid fa-house mr-2"></i>Return Home
            </a>

            <a href="{{ route('manage.booking') }}"
            class="px-6 py-3 bg-gray-100 text-gray-700 border border-gray-300 rounded-lg font-semibold hover:bg-gray-200 transition">
            <i class="fa-solid fa-clipboard-list mr-2"></i>View My Bookings
            </a>
        </div>
    </div>
@endsection