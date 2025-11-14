@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-indigo-900 p-8 rounded-xl shadow-lg">
        
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-100">
                Log in to your account
            </h2>
            <p class="mt-2 text-sm text-gray-100">
                Enter your email and password below to log in
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-green-600 dark:text-green-400" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="mt-8 space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-100">{{ __('Email address') }}</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-100">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="{{ __('Password') }}"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="absolute right-0 top-1 text-sm text-indigo-100 hover:underline">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input 
                    id="remember" 
                    name="remember" 
                    type="checkbox" 
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                    {{ old('remember') ? 'checked' : '' }}
                />
                <label for="remember" class="ml-2 block text-sm text-gray-100">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Submit Button -->
            <div>
                <button 
                    type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg transition"
                    data-test="login-button"
                >
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        @if (Route::has('register'))
            <p class="mt-6 text-center text-sm text-gray-100">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="font-medium text-indigo-100 hover:text-blue-400">
                    {{ __('Sign up') }}
                </a>
            </p>
        @endif
    </div>
</div>
@endsection






{{-- option 2 --}}

{{-- @extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-white p-8 rounded-xl shadow-lg">
        
        <div class="text-center">
            <h2 class="text-3xl font-bold text-black">
                Log in to your account
            </h2>
            <p class="mt-2 text-sm text-black">
                Enter your email and password below to log in
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-green-600 dark:text-green-400" :status="session('status')" />

        <form wire:submit.prevent="login" class="mt-8 space-y-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-black">Email address</label>
                <input
                    wire:model.lazy="email"
                    id="email"
                    type="email"
                    placeholder="email@example.com"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm bg-gray-200 text-black focus:ring-indigo-500 focus:border-indigo-500"
                />
                @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-black">Password</label>
                <input
                    wire:model.lazy="password"
                    id="password"
                    type="password"
                    placeholder="Password"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm bg-gray-200 text-black focus:ring-indigo-500 focus:border-indigo-500"
                />
                @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input wire:model="remember" id="remember" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-black">Remember me</label>
            </div>

            <!-- Submit -->
            <div>
                <button 
                    type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg transition">
                    Log in
                </button>
            </div>

            <!-- Error Message -->
            @if (!empty($errorMessage))
                <p class="text-center text-red-600 bg-red-100 border border-red-400 px-3 py-2 rounded-md mt-3">
                    {{ $errorMessage }}
                </p>
            @endif
        </form>

        @if (Route::has('register'))
            <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('Sign up') }}
                </a>
            </p>
        @endif
    </div>
</div>
@endsection --}}

