@extends('layouts.app')

@section('title', 'Booking Process')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-10 mt-10 border border-gray-200">
    <!-- Header -->
    <div class="mb-8 border-b pb-4">
        <h2 class="text-3xl font-bold text-gray-800">
            <i class="fa-solid fa-receipt text-indigo-600 mr-2"></i>
            Booking Summary
        </h2>
        <p class="text-gray-500 mt-1">Please review your booking details before selecting a car.</p>
    </div>

    <!-- Booking Info Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700">
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pick-up Address</h3>
            <p class="text-lg font-medium text-gray-800">{{ $form['address'] ?? 'N/A' }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Driver Age</h3>
            <p class="text-lg font-medium text-gray-800">{{ $form['age'] ?? 'N/A' }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Pickup</h3>
            <p class="text-lg font-medium text-gray-800">
                {{ $form['pickup_date'] ?? '' }} at {{ $form['pickup_time'] ?? '' }}
            </p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-1">Return</h3>
            <p class="text-lg font-medium text-gray-800">
                {{ $form['return_date'] ?? '' }} at {{ $form['return_time'] ?? '' }}
            </p>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-8 text-right">
        <a href="{{ route('home') }}"
           class="px-5 py-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-200 transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Back to Home
        </a>
    </div>
</div>

<!-- Available Cars Section -->
<div class="max-w-6xl mx-auto mt-14">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        <i class="fa-solid fa-car text-indigo-600 mr-2"></i> Available Cars
    </h2>

    @php
        $availableCars = \App\Models\Car::where('status', 'available')->get();
    @endphp

    @if($availableCars->isEmpty())
        <div class="bg-yellow-50 text-yellow-700 border border-yellow-300 rounded-lg p-5 text-center">
            <i class="fa-solid fa-info-circle mr-2"></i>
            No cars are currently available for the selected dates.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($availableCars as $car)
                <div class="bg-white border border-gray-200 rounded-2xl shadow hover:shadow-lg transition duration-300 overflow-hidden">
                    <!-- Image Placeholder -->
                    <div class="h-44 bg-gray-100 flex items-center justify-center">
                        <i class="fa-solid fa-car-side text-gray-400 text-5xl"></i>
                    </div>

                    <div class="p-6 space-y-2">
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $car->make }} {{ $car->model }}
                        </h3>
                        <p class="text-sm text-gray-500">{{ $car->year }} • {{ ucfirst($car->type) }}</p>

                        <p class="text-gray-700 mt-3 text-sm">
                            {{ Str::limit($car->description, 80, '...') }}
                        </p>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-semibold text-indigo-600">₱{{ number_format($car->daily_rate, 2) }}/day</span>
                            <a href="{{ route('booking.final', ['car' => $car->id]) }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">
                                Select Car
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
