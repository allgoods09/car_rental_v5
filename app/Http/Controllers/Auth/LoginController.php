<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('livewire.auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $user = Auth::user();

    if (session()->has('pending_booking')) {
        $bookingData = session('pending_booking');
        session()->forget('pending_booking');

        return redirect()->route('booking.continue', $bookingData);
    }

    return redirect()->intended(route('home'));
}
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
