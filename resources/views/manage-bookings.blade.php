@extends('layouts.app')

@section('title', 'Manage Bookings')

@php
// Initialize bookings session if empty
if(!session()->has('bookings')) {
    session(['bookings' => []]);
}

// Handle cancellation
if(request()->has('cancel_index')) {
    $bookings = session('bookings', []);
    $index = (int) request('cancel_index');
    if(isset($bookings[$index])) {
        unset($bookings[$index]);
        $bookings = array_values($bookings); // reindex array
        session(['bookings' => $bookings]);
        echo "<script>
            alert('Booking cancelled successfully.');
            window.location.href='".route('manage.booking')."';
        </script>";
    }
}
@endphp

@section('content')
<div class="max-w-7xl mx-auto bg-indigo-900 shadow-xl rounded-2xl p-10 mb-20 mt-3">

    <!-- Header -->
    <div class="mb-8 border-b pb-4">
        <h2 class="text-3xl font-bold text-gray-100">
            <i class="fa-solid fa-list-check text-indigo-400 mr-2"></i>
            Booking Details
        </h2>
        <p class="text-gray-300 mt-1">View your submitted booking information.</p>
    </div>

    <!-- Horizontal Table Format -->
    <div class="overflow-x-hidden">
    <table class="w-full bg-gray-200 rounded-lg overflow-hidden text-left table-auto">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2 font-semibold text-gray-700">Name</th>
                <th class="px-4 py-2 font-semibold text-gray-700">Email</th>
                <th class="px-4 py-2 font-semibold text-gray-700">Pick-up Address</th>
                <th class="px-4 py-2 font-semibold text-gray-700">Driver Age</th>
                <th class="px-4 py-2 font-semibold text-gray-700">Pickup Schedule</th>
                <th class="px-4 py-2 font-semibold text-gray-700">Return Schedule</th>
                <th class="px-4 py-2 font-semibold text-gray-700">Status</th>
                <th class="px-4 py-2 font-semibold text-gray-700">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 bg-white">
            @foreach(session('bookings') as $index => $booking)
            <tr>
                <td class="px-4 py-2 text-gray-800">{{ $booking['name'] }}</td>
                <td class="px-4 py-2 text-gray-800">{{ $booking['email'] }}</td>
                <td class="px-4 py-2 text-gray-800">{{ $booking['address'] }}</td>
                <td class="px-4 py-2 text-gray-800">{{ $booking['driver_age'] }}</td>
                <td class="px-4 py-2 text-gray-800">{{ $booking['pickup_date'] }} at {{ $booking['pickup_time'] }}</td>
                <td class="px-4 py-2 text-gray-800">{{ $booking['return_date'] }} at {{ $booking['return_time'] }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 bg-yellow-400 text-yellow-900 font-semibold rounded-full text-sm">Pending</span>
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('manage.booking', ['cancel_index' => $index]) }}"
                        onclick="return confirm('Are you sure you want to cancel this booking?');"
                        class="px-2 py-1 bg-red-500 text-white text-sm font-semibold rounded hover:bg-red-600 transition">
                        Cancel
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- Back Button -->
    <div class="mt-8 text-right">
        <a href="{{ route('home') }}"
           class="px-6 py-3 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-200 transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Home
        </a>
    </div>

</div>
@endsection
