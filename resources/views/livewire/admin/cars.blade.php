@extends('layouts.admin')

@section('title', 'Cars')

@section('content')
<section class="p-6 space-y-8">

    <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            Fleet of <span class="text-indigo-600">Cars</span>
        </h2>
        <p class="text-gray-600 max-w-2xl">
            View all cars, their availability, and rental status.
        </p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Total Cars</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">75</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Available Now</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">58</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Rented</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">15</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Maintenance</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">2</p>
        </div>
    </div>

    <!-- Cars Table -->
    <div class="bg-white shadow rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Car List</h3>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Add Car</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 table-auto">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3">Car Name</th>
                        <th class="px-4 py-3">Brand</th>
                        <th class="px-4 py-3">Plate Number</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">Vios 2023</td>
                        <td class="px-4 py-3">Toyota</td>
                        <td class="px-4 py-3">ABC-1234</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Available</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Remove</button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">City 2022</td>
                        <td class="px-4 py-3">Honda</td>
                        <td class="px-4 py-3">XYZ-5678</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">Rented</span>
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
