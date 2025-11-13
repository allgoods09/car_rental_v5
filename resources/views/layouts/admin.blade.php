<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - 4A CarRental</title>
    
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://kit.fontawesome.com/a2b3c4d5e6.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 text-gray-900">
    
    @include('partials.navbar')

    {{-- Sidebar + Main Layout --}}
    <div class="flex pt-16"> {{-- pt-16 offsets the top navbar height --}}
        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r border-gray-200 h-[calc(100vh-4rem)] fixed top-16 left-0">
            <nav class="mt-8 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 {{ Route::is('admin.dashboard') ? 'bg-indigo-100' : 'border-transparent' }} hover:text-indigo-600 font-medium transition">
                    <i class="fa-solid fa-chart-line w-5 mr-3 text-indigo-500"></i> Dashboard
                </a>
                <a href="{{ route('admin.statistics') }}"
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 {{ Route::is('admin.statistics') ? 'bg-indigo-100' : 'border-transparent' }} hover:text-indigo-600 font-medium transition">
                    <i class="fa-solid fa-chart-line w-5 mr-3 text-indigo-500"></i> Statistics
                </a>
                <a href="{{ route('admin.bookings') }}"
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 {{ Route::is('admin.bookings') ? 'bg-indigo-100' : 'border-transparent' }} hover:text-indigo-600 font-medium transition">
                    <i class="fa-solid fa-users w-5 mr-3 text-indigo-500"></i> Bookings
                </a>
                <a href=""
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 {{ Route::is('') ? 'bg-indigo-100' : 'border-transparent' }} hover:text-indigo-600 font-medium transition">
                    <i class="fa-solid fa-chart-line w-5 mr-3 text-indigo-500"></i> Transactions
                </a>
                <a href=""
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 {{ Route::is('') ? 'bg-indigo-100' : 'border-transparent' }} hover:text-indigo-600 font-medium transition">
                    <i class="fa-solid fa-chart-line w-5 mr-3 text-indigo-500"></i> Drivers
                </a>
                <a href=""
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 {{ Route::is('') ? 'bg-indigo-100' : 'border-transparent' }} hover:text-indigo-600 font-medium transition">
                    <i class="fa-solid fa-users w-5 mr-3 text-indigo-500"></i> Users
                </a>
                <a href=""
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-indigo-50 {{ Route::is('') ? 'bg-indigo-100' : 'border-transparent' }} hover:text-indigo-600 font-medium transition">
                    <i class="fa-solid fa-car w-5 mr-3 text-indigo-500"></i> Cars
                </a>
            </nav>
        </aside>

        {{-- Dynamic Page Content --}}
        <main class="flex-1 ml-64 p-10">
            @yield('content')
        </main>
    </div>

    <style>
        html {
            scroll-behavior: smooth;
            overflow-y: scroll;
        }
    </style>
</body>
</html>
