@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<section class="p-6 space-y-8">

    <!-- Header -->
    <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            <span class="text-indigo-600">Settings</span> Panel
        </h2>
        <p class="text-gray-600 max-w-2xl">
            Manage your admin account, system preferences, and notification settings.
        </p>
    </div>

    <!-- Account Settings -->
    <div class="bg-white shadow rounded-xl p-6 space-y-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">Account Settings</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin Name</label>
                <input type="text" value="Admin User" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-200 focus:ring focus:outline-none" disabled>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" value="admin@example.com" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-200 focus:ring focus:outline-none" disabled>
            </div>
        </div>
        <button class="mt-4 px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Update Account
        </button>
    </div>

    <!-- System Preferences -->
    <div class="bg-white shadow rounded-xl p-6 space-y-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">System Preferences</h3>
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Enable Email Notifications</span>
                <input type="checkbox" checked class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Maintenance Mode</span>
                <input type="checkbox" class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Enable Two-Factor Authentication</span>
                <input type="checkbox" checked class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
            </div>
        </div>
        <button class="mt-4 px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Save Preferences
        </button>
    </div>

    <!-- Security Settings -->
    <div class="bg-white shadow rounded-xl p-6 space-y-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">Security Settings</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Change Password</label>
                <input type="password" placeholder="••••••••" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-200 focus:ring focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" placeholder="••••••••" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-200 focus:ring focus:outline-none">
            </div>
        </div>
        <button class="mt-4 px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Update Password
        </button>
    </div>

    <!-- Danger Zone -->
    <div class="bg-red-50 shadow rounded-xl p-6 space-y-4">
        <h3 class="text-lg font-semibold text-red-700 mb-3">Danger Zone</h3>
        <p class="text-red-600 text-sm">
            Delete your admin account or reset all system settings. This action cannot be undone.
        </p>
        <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
            Delete Account
        </button>
        <button class="px-6 py-2 bg-red-400 text-white rounded-lg hover:bg-red-500 transition">
            Reset System Settings
        </button>
    </div>

</section>
@endsection
