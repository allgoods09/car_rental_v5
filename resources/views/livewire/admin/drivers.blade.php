@extends('layouts.admin')

@section('title', 'Drivers')

@section('content')
<section class="p-6 space-y-8">

    <!-- Header -->
    <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            Manage <span class="text-indigo-600">Drivers</span>
        </h2>
        <p class="text-gray-600 max-w-2xl">
            View all registered drivers, their availability, and assigned cars.
        </p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Total Drivers</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">45</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Available Today</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">32</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">On Duty</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">12</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Inactive</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">3</p>
        </div>
    </div>

    <!-- Drivers Table -->
    <div class="bg-white shadow rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Driver List</h3>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Add Driver</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 table-auto">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Assigned Car</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">Miguel Santos</td>
                        <td class="px-4 py-3">miguel@example.com</td>
                        <td class="px-4 py-3">0917-123-4567</td>
                        <td class="px-4 py-3">Toyota Vios</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Available</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Remove</button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">Ana Reyes</td>
                        <td class="px-4 py-3">ana@example.com</td>
                        <td class="px-4 py-3">0917-987-6543</td>
                        <td class="px-4 py-3">Honda City</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">On Duty</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
