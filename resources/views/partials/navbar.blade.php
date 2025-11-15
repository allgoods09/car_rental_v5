<header class="w-full bg-indigo-900 shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-50">
    <!-- Left: Logo -->
    <a href="{{ route('home') }}">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Car Rental Logo" class="h-10 w-10 object-contain">
            <h1 class="text-2xl font-bold text-indigo-600">
                4A<span class="text-gray-900">CarRental</span>
            </h1>
        </div>
    </a>

    <!-- Middle: Navigation -->
    <nav class="hidden md:flex gap-8 text-white font-medium">
        <a href="{{ route('home') }}" 
        class="transition border-b-2 {{ Route::is('home') ? 'border-indigo-600' : 'border-transparent' }} hover:border-indigo-600">
        Home
        </a>
        <a href="{{ route('about') }}" 
        class="transition border-b-2 {{ Route::is('about') ? 'border-indigo-600' : 'border-transparent' }} hover:border-indigo-600">
        About
        </a>
        <a href="{{ route('contact') }}" 
        class="transition border-b-2 {{ Route::is('contact') ? 'border-indigo-600' : 'border-transparent' }} hover:border-indigo-600">
        Contact
        </a>
    </nav>

    <!-- Right: Auth Buttons -->
    @if (Route::has('login'))
        <nav class="flex items-center gap-4 text-sm relative">
            @auth
                {{-- Check user role --}}
                @if (Auth::user()->role === 'customer')
                    {{-- Profile image + hamburger --}}
                    <div x-data="{ open: false }" class="relative flex items-center gap-3">
                        {{-- Profile picture --}}
                        <img
                            src="{{ Auth::user()->profile_photo_url ?? asset('images/default-avatar.png') }}"
                            alt="Profile"
                            class="w-9 h-9 rounded-full border-2  object-cover"
                        >

                        {{-- Hamburger button --}}
                        <button
                            @click="open = !open"
                            class="p-2 rounded-md hover:bg-indigo-200 transition hover:text-gray-900"
                            aria-label="Menu"
                        >
                            <!-- Heroicon: Bars-3 -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-100 hover:text-gray-900" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        {{-- Dropdown --}}
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition
                            class="absolute right-0 top-12 w-48 bg-white shadow-lg rounded-lg py-2 border"
                        >
                            <a href="{{ route('manage.booking') }}" class="block px-4 py-2 hover:bg-gray-100">Manage Bookings</a>
                            <a href="{{ route('main.settings') }}" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    type="submit"
                                    class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600"
                                >Logout</button>
                            </form>
                        </div>
                    </div>

                @elseif (Auth::user()->role === 'admin')
                    {{-- Admin version --}}
                    <div x-data="{ open: false }" class="relative flex items-center gap-3">
                        <img
                            src="{{ Auth::user()->profile_photo_url ?? asset('images/default-avatar.png') }}"
                            alt="Profile"
                            class="w-9 h-9 rounded-full border-2 border-indigo-500 object-cover"
                        >

                        <button
                            @click="open = !open"
                            class="p-2 rounded-md hover:bg-indigo-200 transition"
                            aria-label="Menu"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-100 hover:text-gray-900" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition
                            class="absolute right-0 top-12 w-48 bg-white shadow-lg rounded-lg py-2 border"
                        >
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                            <a href="{{ route('admin.settings') }}" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    type="submit"
                                    class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600"
                                >Logout</button>
                            </form>
                        </div>
                    </div>
                @endif
            @else
                {{-- Not logged in --}}
                <a href="{{ route('login') }}" class="px-4 py-2 text-white hover:text-indigo-500 font-medium">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>

<!-- Optional smooth scroll (keeps URL clean) -->
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});
</script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>