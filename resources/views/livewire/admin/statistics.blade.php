@extends('layouts.admin')

@section('title', 'Statistics')

@section('content')
<div class="p-6 space-y-8">

    <!-- Header -->
    <div>
        <h2 class="text-3xl font-bold text-gray-800">
            Business <span class="text-indigo-600">Statistics</span>
        </h2>
        <p class="text-gray-600 mt-2">Track performance metrics and trends for your rentals.</p>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Monthly Revenue</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">₱54,200</p>
            <span class="text-sm text-green-500">+8.3% this month</span>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Bookings Growth</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">+15%</p>
            <span class="text-sm text-gray-500">vs. previous month</span>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Average Rental Duration</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">3.4 days</p>
            <span class="text-sm text-gray-500">Avg. per booking</span>
        </div>
    </div>

    <!-- Placeholder for Future Graphs -->
    <div class="bg-white p-8 rounded-xl shadow flex flex-col items-center justify-center text-gray-500 h-96">
        <p class="text-lg font-medium">📊 Chart placeholder — integrate Livewire/Chart.js later</p>
        <p class="text-sm mt-2">Displays revenue trends, car utilization, or booking frequency.</p>
    </div>

</div>
@endsection
