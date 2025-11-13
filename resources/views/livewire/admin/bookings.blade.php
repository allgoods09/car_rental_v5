@extends('layouts.admin')

@section('title', 'Bookings')

@section('content')
<section class="p-6 space-y-8">

    <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            Welcome to your <span class="text-indigo-600">Bookings</span>
        </h2>
        <p class="text-gray-600 max-w-2xl">
            Manage all bookings, view rental history, and track customer activity.
        </p>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white shadow rounded-xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Recent Bookings</h3>
            <input type="text" placeholder="Search..." class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:ring focus:ring-indigo-200" />
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Car</th>
                        <th class="px-4 py-3">Pickup</th>
                        <th class="px-4 py-3">Return</th>
                        <th class="px-4 py-3">Total (₱)</th>
                        <th class="px-4 py-3 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">
                                {{ $booking->user?->name ?? '—' }}
                                <div class="text-xs text-gray-500">{{ $booking->user?->email ?? '' }}</div>
                            </td>
                            <td class="px-4 py-3">{{ $booking->car?->brand ?? 'N/A' }} {{ $booking->car?->model ?? '' }}</td>
                            <td class="px-4 py-3">{{ $booking->pickup_datetime->format('M d, Y h:i A') }}</td>
                            <td class="px-4 py-3">{{ $booking->return_datetime->format('M d, Y h:i A') }}</td>
                            <td class="px-4 py-3 font-semibold text-indigo-600">
                                ₱{{ number_format($booking->total_amount, 2) }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'approved' => 'bg-blue-100 text-blue-700',
                                        'rejected' => 'bg-red-100 text-red-700',
                                        'completed' => 'bg-green-100 text-green-700',
                                        'cancelled' => 'bg-gray-200 text-gray-700',
                                    ];
                                @endphp
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $statusColors[$booking->status] ?? 'bg-gray-100' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-6">
                                No bookings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
