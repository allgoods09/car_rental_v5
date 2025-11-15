@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="max-w-4xl mx-auto p-6 space-y-8 mt-10">

    <!-- Header -->
    <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-100 mb-2">
            <span class="text-gray-300">My Settings</span>
        </h2>
        <p class="text-gray-300">
            Update your account details, preferences, and security options.
        </p>
    </div>

    <!-- Account Details -->
    <div class="bg-gray-800 p-6 rounded-xl shadow-md space-y-4">
        <h3 class="text-lg font-semibold text-gray-100">Account Information</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Full Name</label>
                <input type="text" value="John Doe" class="w-full px-3 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500" disabled>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                <input type="email" value="johndoe@gmail.com" class="w-full px-3 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500" disabled>
            </div>
        </div>
        <button class="mt-4 w-full sm:w-auto px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Update Information
        </button>
    </div>

    <!-- Preferences -->
    <div class="bg-gray-800 p-6 rounded-xl shadow-md space-y-4">
        <h3 class="text-lg font-semibold text-gray-100">Preferences</h3>
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <span class="text-gray-300">Receive Promotional Emails</span>
                <input type="checkbox" checked class="h-5 w-5 text-indigo-600 border-gray-600 rounded focus:ring-indigo-500">
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-300">Enable SMS Notifications</span>
                <input type="checkbox" class="h-5 w-5 text-indigo-600 border-gray-600 rounded focus:ring-indigo-500">
            </div>
        </div>
        <button class="mt-4 w-full sm:w-auto px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Save Preferences
        </button>
    </div>

    <!-- Security -->
    <div class="bg-gray-800 p-6 rounded-xl shadow-md space-y-4">
        <h3 class="text-lg font-semibold text-gray-100">Security</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">New Password</label>
                <input type="password" placeholder="••••••••" class="w-full px-3 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
                <input type="password" placeholder="••••••••" class="w-full px-3 py-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>
        <button class="mt-4 w-full sm:w-auto px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            Update Password
        </button>
    </div>

    <!-- Danger Zone -->
    <div class="bg-red-50 p-6 rounded-xl shadow-md space-y-4">
        <h3 class="text-lg font-semibold text-red-700">Danger Zone</h3>
        <p class="text-red-600 text-sm">
            Delete your account. This action is permanent and cannot be undone.
        </p>
        <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition w-full sm:w-auto">
            Delete Account
        </button>
    </div>

</div>
@endsection
