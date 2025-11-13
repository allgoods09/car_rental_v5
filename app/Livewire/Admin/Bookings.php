<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;

class Bookings extends Component
{
    public function render()
    {
        $bookings = Booking::with(['user', 'car'])->latest()->get();

        return view('livewire.admin.bookings', [
            'bookings' => $bookings,
        ]);
    }
}