{{-- @extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section id="dashboard" class="min-h-screen bg-gray-100 py-20 px-6 flex flex-col justify-center">
        <div class="max-w-6xl mx-auto text-center">
            <h3 class="text-4xl font-bold text-gray-800 mb-6">Welcome to your <span class="text-indigo-600">Dashboard</span></h3>
            <p class="text-gray-600 max-w-2xl mx-auto mb-10">
                Here you can manage your bookings, view rental history, and update your profile information.
            </p>
        </div>
    </section>
@endsection --}}

{{-- @extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex bg-gray-100">
    
    <aside class="w-64 bg-white shadow-md border-r border-gray-200 fixed h-full">
        <div class="p-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-indigo-600">Car Rental</h1>
        </div>

        <nav class="mt-8 space-y-1">
            <a href="{{ route('dashboard') }}"
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-medium transition">
                <i class="fa-solid fa-chart-line w-5 mr-3 text-indigo-500"></i> Dashboard
            </a>
            <a href=""
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-medium transition">
                <i class="fa-solid fa-users w-5 mr-3 text-indigo-500"></i> Users
            </a>
            <a href=""
               class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-medium transition">
                <i class="fa-solid fa-car w-5 mr-3 text-indigo-500"></i> Cars
            </a>
        </nav>
    </aside>

    <main class="flex-1 ml-64 py-20 px-10">
        <section id="dashboard" class="min-h-screen">
            <div class="max-w-6xl mx-auto text-center">
                <h3 class="text-4xl font-bold text-gray-800 mb-6">
                    Welcome to your <span class="text-indigo-600">Dashboard</span>
                </h3>
                <p class="text-gray-600 max-w-2xl mx-auto mb-10">
                    Here you can manage your bookings, view rental history, and update your profile information.
                </p>
            </div>
        </section>
    </main>
</div>
@endsection --}}

@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<section>
    <h2 class="text-3xl font-bold text-gray-800 mb-6">
        Welcome to your <span class="text-indigo-600">Dashboard</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mb-10">
        Manage bookings, view rental history, and update your profile.
    </p>
</section>
@endsection

