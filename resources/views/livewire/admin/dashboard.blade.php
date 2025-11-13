@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="p-6 space-y-8">

    <!-- Header -->
    <div>
        <h2 class="text-3xl font-bold text-gray-800">
            Welcome back, <span class="text-indigo-600">Admin</span> 👋
        </h2>
        <p class="text-gray-600 mt-2">Here's an overview of your rental business performance.</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Total Bookings</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">1,245</p>
            <span class="text-sm text-green-500">+12% from last month</span>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Active Cars</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">58</p>
            <span class="text-sm text-gray-500">Out of 75 total cars</span>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Registered Users</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">328</p>
            <span class="text-sm text-green-500">+5 new today</span>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Revenue (₱)</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">₱245,870</p>
            <span class="text-sm text-red-500">-3% from last week</span>
        </div>
    </div>

    <!-- Recent Bookings Table -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Recent Bookings</h3>
            <a href="#" class="text-sm text-indigo-600 hover:underline">View all</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Car</th>
                        <th class="px-4 py-3">Pickup Date</th>
                        <th class="px-4 py-3">Return Date</th>
                        <th class="px-4 py-3 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">John Cruz</td>
                        <td class="px-4 py-3">Toyota Vios</td>
                        <td class="px-4 py-3">2025-10-25</td>
                        <td class="px-4 py-3">2025-10-28</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                Completed
                            </span>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">Maria Santos</td>
                        <td class="px-4 py-3">Honda City</td>
                        <td class="px-4 py-3">2025-10-26</td>
                        <td class="px-4 py-3">2025-10-29</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                Ongoing
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
