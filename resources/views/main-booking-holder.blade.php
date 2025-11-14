@extends('layouts.app')

@section('title', 'Booking')

@section('content')
    @php
    // --- Date and Time Logic for constraints ---
    
    // Set the minimum selectable date to today (YYYY-MM-DD format)
    $minDate = now()->toDateString();

    // Generate time options from 8:00 AM (08:00) to 6:00 PM (18:00)
    $times = [];
    for ($i = 8; $i <= 18; $i++) {
        $timeValue = date('H:i', strtotime("$i:00"));
        $timeDisplay = date('g:i A', strtotime("$i:00"));
        $times[] = ['value' => $timeValue, 'display' => $timeDisplay];
    }
@endphp

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    
    {{-- Main Container (Wider than the login form for better spacing) --}}
    <div class="max-w-2xl w-full space-y-8 bg-indigo-900 p-10 rounded-xl shadow-2xl">
        
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-100">
                Book Your Ride
            </h2>
            <p class="mt-2 text-sm text-gray-100">
                Select your pickup/return details to start your rental journey.
            </p>
        </div>

        <form action="" method="POST" class="mt-8 space-y-6">
            {{-- Note: action is intentionally left empty as requested --}}
            
            <!-- 1. Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-100">Pickup/Return Address</label>
                <input
                    id="address"
                    name="address"
                    type="text"
                    required
                    placeholder="Enter City or Specific Address"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
            </div>

            <!-- 2. Pickup Details (Date & Time) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Pickup Date --}}
                <div>
                    <label for="pickup_date" class="block text-sm font-medium text-gray-100">Pickup Date</label>
                    <input
                        id="pickup_date"
                        name="pickup_date"
                        type="date"
                        required
                        min="{{ $minDate }}"
                        class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black appearance-none"
                    />
                </div>

                {{-- Pickup Time --}}
                <div>
                    <label for="pickup_time" class="block text-sm font-medium text-gray-100">Pickup Time (8 AM - 6 PM)</label>
                    <select
                        id="pickup_time"
                        name="pickup_time"
                        required
                        class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                    >
                        @foreach ($times as $time)
                            <option value="{{ $time['value'] }}">{{ $time['display'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- 3. Return Details (Date & Time) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Return Date --}}
                <div>
                    <label for="return_date" class="block text-sm font-medium text-gray-100">Return Date</label>
                    <input
                        id="return_date"
                        name="return_date"
                        type="date"
                        required
                        min="{{ $minDate }}"
                        class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black appearance-none"
                    />
                </div>

                {{-- Return Time --}}
                <div>
                    <label for="return_time" class="block text-sm font-medium text-gray-100">Return Time (8 AM - 6 PM)</label>
                    <select
                        id="return_time"
                        name="return_time"
                        required
                        class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                    >
                        @foreach ($times as $time)
                            <option value="{{ $time['value'] }}">{{ $time['display'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- 4. Driver Age -->
            <div>
                <label for="driver_age" class="block text-sm font-medium text-gray-100">Driver Age</label>
                <input
                    id="driver_age"
                    name="driver_age"
                    type="number"
                    min="18"
                    max="100"
                    required
                    placeholder="Minimum age is 18"
                    class="mt-1 block w-full px-4 py-3 border border-gray-900 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 text-black"
                />
            </div>

            <!-- 5. Submit Button -->
            <div class="pt-2">
                <button 
                    type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg transition"
                >
                    Book for a car
                </button>
            </div>
        </form>
    </div>
</div>
@endsection