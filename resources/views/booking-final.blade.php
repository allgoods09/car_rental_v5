@extends('layouts.app')

@section('title', 'Continue Booking')

@section('content')
<div class="max-w-4xl mx-auto bg-gray-900 text-white rounded-2xl shadow-lg p-8 mt-10 border border-gray-700">
    <h2 class="text-3xl font-bold mb-6 text-center text-yellow-400">Booking Summary</h2>

    <!-- Booking Details -->
    <div class="bg-gray-800 rounded-xl p-6 mb-6">
        <h3 class="text-xl font-semibold mb-3 border-b border-gray-700 pb-2">Booking Details</h3>
        <ul class="space-y-2 text-gray-300">
            <li><strong>Address:</strong> {{ $form['address'] }}</li>
            <li><strong>Driver Age:</strong> {{ $form['age'] }}</li>
            <li><strong>Pickup:</strong> {{ $form['pickup_date'] }} at {{ $form['pickup_time'] }}</li>
            <li><strong>Return:</strong> {{ $form['return_date'] }} at {{ $form['return_time'] }}</li>
            <li><strong>Rental Days:</strong> {{ $rentalDays }} day(s)</li>
        </ul>
    </div>

    <!-- Car Details -->
    <div class="bg-gray-800 rounded-xl p-6 mb-6">
        <h3 class="text-xl font-semibold mb-3 border-b border-gray-700 pb-2">Selected Car</h3>
        <div class="flex items-center gap-4">
            @if($car->attachments->first())
                <img src="{{ asset('storage/' . $car->attachments->first()->file_path) }}" alt="{{ $car->model }}" class="w-40 h-28 rounded-lg object-cover">
            @endif
            <div>
                <h4 class="text-lg font-bold text-yellow-400">{{ $car->make }} {{ $car->model }} ({{ $car->year }})</h4>
                <p class="text-sm text-gray-400">{{ ucfirst($car->type) }}</p>
                <p class="mt-1 text-sm text-gray-300">₱{{ number_format($car->daily_rate, 2) }} / day</p>
            </div>
        </div>
    </div>

    <!-- Payment Breakdown -->
    <div class="bg-gray-800 rounded-xl p-6 mb-6">
        <h3 class="text-xl font-semibold mb-3 border-b border-gray-700 pb-2">Payment Breakdown</h3>
        <ul class="space-y-2 text-gray-300">
            <li class="flex justify-between"><span>Car Subtotal ({{ $rentalDays }} days):</span> <span>₱{{ number_format($carSubtotal, 2) }}</span></li>
            <li class="flex justify-between"><span>Extras:</span> <span>₱{{ number_format($extrasSubtotal, 2) }}</span></li>
            <li class="flex justify-between text-yellow-400 font-semibold border-t border-gray-700 pt-2"><span>Total:</span> <span>₱{{ number_format($totalAmount, 2) }}</span></li>
        </ul>
    </div>

    <!-- Action Buttons -->
    <div class="text-center">
        <form action="{{ route('booking.confirm') }}" method="POST">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <button type="submit" class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-black font-bold rounded-lg shadow-md transition-all">
                Book Now!
            </button>
        </form>
        <a href="{{ route('home') }}" class="mt-4 inline-block text-gray-400 hover:text-white text-sm">Cancel and go back</a>
    </div>
</div>

@endsection