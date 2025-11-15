@extends('layouts.app')

@section('title', 'Booking Final')

@section('content')
    <div class="max-w-5xl mx-auto bg-indigo-900 shadow-xl rounded-2xl pt-10 p-10 mb-20 mt-3">
        <!-- Header -->
        <div class="mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-100">
                <i class="fa-solid fa-circle-check text-indigo-600 mr-2"></i>
                Final Booking Summary
            </h2>
            <p class="text-gray-300 mt-1">Review your selected car and total payment before confirming.</p>
        </div>

        <!-- Booking Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700 mb-10">
            <div class="bg-gray-300 p-5 rounded-lg border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Name</h3>
                <p class="text-lg font-medium text-gray-800">John Doe</p>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Email Address</h3>
                <p class="text-lg font-medium text-gray-800">johndoe@gmail.com</p>
            </div>

            <div class="col-span-1 sm:col-span-2 flex items-center">
                <input type="checkbox" id="useCredentials" name="useCredentials" checked
                    class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <label for="useCredentials" class="ml-3 text-gray-100 text-sm font-medium">
                    Use my own credentials
                </label>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pick-up Address</h3>
                <p class="text-lg font-medium text-gray-800">{{ request('address') }}</p>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Driver Age</h3>
                <p class="text-lg font-medium text-gray-800">{{ request('driver_age') }}</p>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pickup</h3>
                <p class="text-lg font-medium text-gray-800">
                    {{ request('pickup_date') }} at {{ request('pickup_time') }}
                </p>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Return</h3>
                <p class="text-lg font-medium text-gray-800">
                    {{ request('return_date') }} at {{ request('return_time') }}
                </p>
            </div>
        </div>

        <!-- Selected Car -->
        <div class="bg-gray-300 p-6 rounded-xl mb-10">
            <h3 class="text-xl font-bold text-gray-800 mb-4">
                <i class="fa-solid fa-car-side text-indigo-600 mr-2"></i> Selected Car
            </h3>

            <p class="text-gray-600">No available cars</p>
        </div>

        <!-- Payment Breakdown -->
        <div class="bg-gray-300 p-6 rounded-xl border border-gray-200 mb-10">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fa-solid fa-wallet text-indigo-600 mr-2"></i> Payment Breakdown
            </h3>

            <ul class="space-y-3 text-gray-700">
                <li class="flex justify-between">
                    <span>Car Subtotal (0 days):</span>
                    <span class="font-medium">₱0.00</span>
                </li>
                <li class="flex justify-between">
                    <span>Extras:</span>
                    <span class="font-medium">₱0.00</span>
                </li>
                <li class="flex justify-between border-t pt-3 text-lg font-semibold text-indigo-700">
                    <span>Total:</span>
                    <span>₱0.00</span>
                </li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="{{ route('main.booking') }}" 
            class="px-5 py-3 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-200 transition w-full sm:w-auto text-center">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to Cars
            </a>

            <form method="GET" action="{{ route('booking.confirm') }}">
                <input type="hidden" name="name" value="{{ request('name') ?? 'John Doe' }}">
                <input type="hidden" name="email" value="{{ request('email') ?? 'johndoe@gmail.com' }}">
                <input type="hidden" name="address" value="{{ request('address') }}">
                <input type="hidden" name="driver_age" value="{{ request('driver_age') }}">
                <input type="hidden" name="pickup_date" value="{{ request('pickup_date') }}">
                <input type="hidden" name="pickup_time" value="{{ request('pickup_time') }}">
                <input type="hidden" name="return_date" value="{{ request('return_date') }}">
                <input type="hidden" name="return_time" value="{{ request('return_time') }}">
                
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition w-full sm:w-auto">
                    <i class="fa-solid fa-check mr-2"></i> Book Now!
                </button>
            </form>

            {{-- <a 
                href="{{ route('booking.confirm') }}"
                class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition w-full sm:w-auto">
                <i class="fa-solid fa-check mr-2"></i> Book Now!
            </a> --}}
        </div>
    </div>
@endsection




{{-- @extends('layouts.app')

@section('title', 'Booking Final')

@section('content')
    <div class="max-w-5xl mx-auto bg-indigo-900 shadow-xl rounded-2xl pt-10 p-10 mt-3">

        <!-- Header -->
        <div class="mb-8 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-100">
                <i class="fa-solid fa-circle-check text-indigo-600 mr-2"></i>
                Final Booking Summary
            </h2>
            <p class="text-gray-300 mt-1">Review your booking details before confirming.</p>
        </div>

        <!-- Booking Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700 mb-10">

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pick-up Address</h3>
                <p class="text-lg font-medium text-gray-800">{{ request('address') }}</p>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Driver Age</h3>
                <p class="text-lg font-medium text-gray-800">{{ request('driver_age') }}</p>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pickup</h3>
                <p class="text-lg font-medium text-gray-800">
                    {{ request('pickup_date') }} at {{ request('pickup_time') }}
                </p>
            </div>

            <div class="bg-gray-300 p-5 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Return</h3>
                <p class="text-lg font-medium text-gray-800">
                    {{ request('return_date') }} at {{ request('return_time') }}
                </p>
            </div>
        </div>

        <!-- Selected Car -->
        <div class="bg-gray-300 p-6 rounded-xl mb-10">
            <h3 class="text-xl font-bold text-gray-800 mb-4">
                <i class="fa-solid fa-car-side text-indigo-600 mr-2"></i> Selected Car
            </h3>

            <p class="text-gray-600">No available cars</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">

            <a href="{{ route('main.booking') }}"
               class="px-5 py-3 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-200 transition w-full sm:w-auto text-center">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back
            </a>

            <a href="{{ route('booking.confirm') }}"
               class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition w-full sm:w-auto">
                <i class="fa-solid fa-check mr-2"></i> Book Now!
            </a>

        </div>

    </div>
@endsection --}}
