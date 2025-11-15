@extends('layouts.app')

@section('title', 'About')

@section('content')
    <section id="about" class="min-h-screen  py-20 px-6 flex flex-col justify-center">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-10">
            <!-- Left Image -->
            <div class="w-full lg:w-1/2">
                <img src="https://i.ibb.co/S749mCyb/Gemini-Generated-Image-9amjr49amjr49amj.png" alt="About 4A Car Rental" class="rounded-2xl shadow-lg object-cover w-full h-[400px]">
            </div>

            <!-- Right Content -->
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <h3 class="text-4xl font-bold text-gray-100 mb-6">About <span class="text-indigo-600">4A Car Rental</span></h3>
                <p class="text-gray-200 leading-relaxed mb-6 font-bold">
                    At 4A Car Rental, we believe every trip should start with a smooth ride. Our goal is to provide
                    convenient, reliable, and affordable car rental services across the Philippines.
                    Whether you’re exploring the city, traveling for business, or going on a weekend getaway,
                    we have the perfect car to match your journey.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
                    <div class="flex items-center gap-4 bg-indigo-800 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13a4 4 0 118 0M5 13V7a2 2 0 012-2h6a2 2 0 012 2v6m4 0a4 4 0 11-8 0m8 0V7a2 2 0 00-2-2h-2"/></svg>
                        </div>
                        <p class="text-gray-100 font-semibold">Flexible Rental Plans</p>
                    </div>

                    <div class="flex items-center gap-4 bg-indigo-800 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <p class="text-gray-100 font-semibold">Top-rated Vehicles</p>
                    </div>

                    <div class="flex items-center gap-4 bg-indigo-800 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18" /></svg>
                        </div>
                        <p class="text-gray-100 font-semibold">Wide Car Selection</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection