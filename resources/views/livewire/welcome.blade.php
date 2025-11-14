@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <section 
        id="home" 
        class="min-h-[calc(100vh-80px)] flex flex-col items-center justify-center text-center px-6"
    >
        <h2 class="text-4xl md:text-6xl font-bold mb-4 text-gray-200">Laag Na, Bisan Asa.</h2>

        <p class="text-lg text-white max-w-xl mb-8">
            Experience hassle-free car rentals with affordable rates, flexible booking, and top-quality vehicles.
        </p>

        {{-- The container class changes based on authentication status --}}
        <div class="flex {{ Auth::check() ? 'justify-center' : 'gap-4' }}">

            {{-- RENT A CAR BUTTON LOGIC --}}
            <a 
                @auth
                    {{-- If logged in, direct to the booking page directly --}}
                    href="{{ route('main.booking') }}"
                    {{-- Use a wider class when the other button is hidden --}}
                    class="w-60 py-3 bg-indigo-600 text-white rounded-md text-lg font-semibold hover:bg-indigo-700 transition"
                @else
                    {{-- If not logged in, direct to the login page.
                        We pass the intended booking route so Laravel redirects them there immediately after successful login. --}}
                    href="{{ route('login', ['intended' => route('booking', [], false)]) }}"
                    {{-- Use original padding when both buttons are visible --}}
                    class="px-6 py-3 bg-indigo-600 text-white rounded-md text-lg font-semibold hover:bg-indigo-700 transition"
                @endauth
            >
                Rent a Car
            </a>

            {{-- BECOME A MEMBER BUTTON (Only visible for guests) --}}
            @guest
                <a href="{{ route('register') }}"
                class="px-6 py-3 border border-indigo-600 text-white hover:text-indigo-900 rounded-md text-lg font-semibold hover:bg-indigo-50 transition">
                    Become a Member
                </a>
            @endguest
        </div>
    </section>
@endsection