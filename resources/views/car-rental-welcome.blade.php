@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    <section id="home" class="flex flex-col items-center justify-center text-center px-6 py-20 bg-[url('')]">
        <h2 class="text-4xl md:text-6xl font-bold mb-4">Laag Na, Bisan Asa.</h2>
        <p class="text-lg text-gray-600 max-w-xl mb-8">
            Experience hassle-free car rentals with affordable rates, flexible booking, and top-quality vehicles.
        </p>

        {{-- <div class="flex gap-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-md text-lg font-semibold hover:bg-indigo-700 transition">
                Rent a Car
            </a>
            <a href="{{ route('register') }}" class="px-6 py-3 border border-indigo-600 text-indigo-600 rounded-md text-lg font-semibold hover:bg-indigo-50 transition">
                Become a Member
            </a>
        </div> --}}
    </section>

    <form 
    action="{{ route('booking.continue') }}" 
    method="GET" 
    class="max-w-5xl mx-auto bg-white p-10 rounded-2xl shadow-lg border border-gray-200 space-y-8"
>
    @csrf

    <h3 class="text-3xl font-bold text-gray-800 text-center mb-6">Start Your Booking</h3>

    <!-- Form Row 1: Address -->
    <div class="flex flex-col sm:flex-row items-start gap-6">
        <div class="flex-1 relative w-full">
            <label for="address" class="text-gray-700 font-medium mb-2 block">Pick-up Address</label>
            <input 
                type="text" 
                name="address" 
                id="address"
                placeholder="Type or select your address..."
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                autocomplete="off"
                oninput="showSuggestions(this.value)"
                required
            >
            <!-- Dropdown Suggestions -->
            <ul id="addressSuggestions"
                class="absolute left-0 right-0 bg-white border border-gray-300 rounded-lg mt-1 w-full max-h-48 overflow-y-auto shadow-xl hidden z-50">
                @foreach ($addresses as $address)
                    <li 
                        class="px-4 py-2 hover:bg-indigo-100 cursor-pointer text-gray-700 transition"
                        onclick="selectAddress('{{ $address->name }}')">
                        {{ $address->name }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex-1">
            <label for="age" class="text-gray-700 font-medium mb-2 block">Driver Age</label>
            <input 
                type="number" 
                name="age" 
                id="age" 
                min="18" 
                placeholder="Enter your age" 
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                required
            >
        </div>
    </div>

    <!-- Form Row 2: Pickup -->
    <div class="flex flex-col sm:flex-row items-start gap-6">
        <div class="flex-1">
            <label for="pickup_date" class="text-gray-700 font-medium mb-2 block">Pick-up Date</label>
            <input 
                type="date" 
                name="pickup_date" 
                id="pickup_date" 
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                required
            >
        </div>

        <div class="flex-1">
            <label for="pickup_time" class="text-gray-700 font-medium mb-2 block">Pick-up Time</label>
            <select 
                name="pickup_time" 
                id="pickup_time" 
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                required
            >
                <option value="">Select Time</option>
                @for ($hour = 8; $hour <= 18; $hour++)
                    @php
                        $ampm = $hour >= 12 ? 'PM' : 'AM';
                        $display = ($hour > 12) ? $hour - 12 : $hour;
                        $timeValue = sprintf('%02d:00', $hour);
                    @endphp
                    <option value="{{ $timeValue }}">{{ $display }}:00 {{ $ampm }}</option>
                @endfor
            </select>
        </div>
    </div>

    <!-- Form Row 3: Return -->
    <div class="flex flex-col sm:flex-row items-start gap-6">
        <div class="flex-1">
            <label for="return_date" class="text-gray-700 font-medium mb-2 block">Return Date</label>
            <input 
                type="date" 
                name="return_date" 
                id="return_date" 
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                required
            >
        </div>

        <div class="flex-1">
            <label for="return_time" class="text-gray-700 font-medium mb-2 block">Return Time</label>
            <select 
                name="return_time" 
                id="return_time" 
                class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                required
            >
                <option value="">Select Time</option>
                @for ($hour = 8; $hour <= 18; $hour++)
                    @php
                        $ampm = $hour >= 12 ? 'PM' : 'AM';
                        $display = ($hour > 12) ? $hour - 12 : $hour;
                        $timeValue = sprintf('%02d:00', $hour);
                    @endphp
                    <option value="{{ $timeValue }}">{{ $display }}:00 {{ $ampm }}</option>
                @endfor
            </select>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-center pt-4">
        <button 
            type="submit" 
            class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition shadow-md"
        >
            Book For Available Cars
        </button>
    </div>

    <!-- JS for Address Suggestions & Date Logic -->
    <script>
        const allAddresses = @json($addresses->pluck('name'));
        const suggestionsBox = document.getElementById('addressSuggestions');
        const inputField = document.getElementById('address');

        function showSuggestions(value) {
            const filter = value.toLowerCase();
            suggestionsBox.innerHTML = '';

            if (filter.trim() === '') {
                suggestionsBox.classList.add('hidden');
                return;
            }

            const filtered = allAddresses.filter(addr => addr.toLowerCase().includes(filter));
            if (filtered.length === 0) {
                suggestionsBox.classList.add('hidden');
                return;
            }

            filtered.forEach(addr => {
                const li = document.createElement('li');
                li.textContent = addr;
                li.className = 'px-4 py-2 hover:bg-indigo-100 cursor-pointer text-gray-700 transition';
                li.onclick = () => selectAddress(addr);
                suggestionsBox.appendChild(li);
            });

            suggestionsBox.classList.remove('hidden');
        }

        function selectAddress(address) {
            inputField.value = address;
            suggestionsBox.classList.add('hidden');
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('#addressSuggestions') && e.target !== inputField) {
                suggestionsBox.classList.add('hidden');
            }
        });

        // Default date to today, disable past dates
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('pickup_date').setAttribute('min', today);
        document.getElementById('return_date').setAttribute('min', today);
        document.getElementById('pickup_date').value = today;
        document.getElementById('return_date').value = today;

        // Default time to 8:00 AM
        document.getElementById('pickup_time').value = "08:00";
    </script>
</form>


    <!-- Available Cars Section -->
    <section class="max-w-7xl mx-auto mt-16 px-6">
        <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Available Cars</h3>

        @if ($cars->isEmpty())
            <p class="text-center text-gray-500">No cars available right now.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cars as $car)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                        {{-- Car image (if you have attachments) --}}
                        @if($car->attachments->isNotEmpty())
                            <img src="{{ asset('storage/' . $car->attachments->first()->path) }}" 
                                alt="{{ $car->make }} {{ $car->model }}"
                                class="h-48 w-full object-cover">
                        @else
                            <img src="{{ asset('images/default-car.jpg') }}" 
                                alt="Default Car Image"
                                class="h-48 w-full object-cover">
                        @endif

                        <div class="p-5 flex flex-col gap-3">
                            <h4 class="text-xl font-semibold text-gray-800">
                                {{ $car->year }} {{ $car->make }} {{ $car->model }}
                            </h4>

                            <p class="text-gray-600 text-sm capitalize">
                                Type: {{ $car->type }}
                            </p>

                            <p class="text-gray-600 text-sm">
                                Rating: ⭐ {{ $car->average_rating ?? 'No reviews yet' }}
                            </p>

                            {{-- <div class="flex items-center justify-between mt-3">
                                <span class="text-indigo-600 font-bold text-lg">
                                    ₱{{ number_format($car->price_per_day, 2) }}/day
                                </span>
                                <a href="{{ route('booking.continue', ['car_id' => $car->id]) }}"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                                    Book Now
                                </a>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

@endsection
