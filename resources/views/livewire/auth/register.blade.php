@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">
        
        <!-- Header -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-black">
                Create an account
            </h2>
            <p class="mt-2 text-sm text-black">
                Enter your details below to create your account
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-green-600 dark:text-green-400" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="mt-8 space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-black">{{ __('Name') }}</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Full name"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-black">{{ __('Email address') }}</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-black">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Password"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-black">{{ __('Confirm password') }}</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm password"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
            </div>

            <!-- Submit Button -->
            <div>
                <button 
                    type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg transition"
                >
                    {{ __('Create account') }}
                </button>
            </div>
        </form>

        <!-- Already have account -->
        <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            {{ __('Already have an account?') }}
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Log in') }}
            </a>
        </p>
    </div>
</div>
@endsection
