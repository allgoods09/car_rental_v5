@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<section class="p-6 space-y-8">

    <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            Registered <span class="text-indigo-600">Users</span>
        </h2>
        <p class="text-gray-600 max-w-2xl">
            View all registered users and their account activity.
        </p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Total Users</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">328</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Active Today</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">102</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">New Signups</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">5</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-gray-500 text-sm font-semibold">Premium Users</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">18</p>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white shadow rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">User List</h3>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Add User</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 table-auto">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Member Since</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">John Cruz</td>
                        <td class="px-4 py-3">john@example.com</td>
                        <td class="px-4 py-3">0917-123-4567</td>
                        <td class="px-4 py-3">2022-03-15</td>
                        <td class="px-4 py-3 text-center">
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Remove</button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">Maria Santos</td>
                        <td class="px-4 py-3">maria@example.com</td>
                        <td class="px-4 py-3">0917-987-6543</td>
                        <td class="px-4 py-3">2023-07-21</td>
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
