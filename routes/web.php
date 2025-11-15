<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Bookings;
use App\Livewire\Admin\Statistics;
use App\Livewire\Admin\Transactions;
use App\Livewire\Admin\Drivers;
use App\Livewire\Admin\Cars;
use App\Livewire\Customer\Bookings as CustomerBookings;
use App\Http\Controllers\BookingController;
use App\Livewire\Mainflow\Booking as MainBooking;
use App\Livewire\Welcome;



Route::get('/', [CarController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.store');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.store');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

 Route::get('/booking/continue', [BookingController::class, 'continueBooking'])->name('booking.continue');
     Route::get('/booking/final/{car}', [BookingController::class, 'finalStep'])->name('booking.final');  // Uses route model binding for Car
    //  Route::post('/booking/confirm', [BookingController::class, 'confirmBooking'])->name('booking.confirm');

// Route::get('/home', [WelcomeController::class, 'index'])
//     ->middleware('auth')
//     ->name('home');

Route::get('manage/bookings', CustomerBookings::class)
    ->middleware('auth')
    ->name('customer.bookings');

Route::view('contact', 'contact')->name('contact');

Route::view('about', 'about')->name('about');



// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('admin/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('livewire.admin.dashboard'); // or return your Livewire component
    }

    return redirect('/')->with('error', 'Unauthorized access.');
})->name('admin.dashboard');

Route::get('admin/statistics', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('livewire.admin.statistics'); // or return your Livewire component
    }

    return redirect('/')->with('error', 'Unauthorized access.');
})->name('admin.statistics');

Route::get('admin/bookings', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('livewire.admin.bookings', [
            'bookings' => \App\Models\Booking::latest()->get(),
        ]);
    }

    return redirect('/')->with('error', 'Unauthorized access.');
})->name('admin.bookings');

Route::get('admin/transactions', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return view('admin.transaction-page');
    }

    return redirect('/')->with('error', 'Unauthorized access.');
})->name('admin.transactions');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});


Route::get('/booking/continue', function (Illuminate\Http\Request $request) {
    // Check if user is authenticated
    if (!Auth::check()) {
        // Save form data temporarily in session (optional)
        session(['booking_form' => $request->all()]);

        // Redirect to login with a message
        return redirect()->route('login')->with('error', 'Please log in to continue your booking.');
    }

    // Otherwise, proceed to booking process
    return view('booking-process', [
        'form' => $request->all(),
    ]);
})->name('booking.continue');


Route::view('booking/final', 'tempblade')->name('booking.temp');
Route::view('booking/confirmation', 'tempblade2')->name('booking.confirmation');

Route::view('manage/bookings', 'managestatic')->name('manage.bookings');

// Route::get('main/booking', MainBooking::class)->name('main.booking');

Route::view('main/booking', 'main-booking-holder')->name('main.booking');

Route::view('main/booking/final', 'main-booking-holder-final')->name('final.booking');

Route::view('main/booking/final/confirmation', 'main-booking-holder-final-confirm')->name('booking.confirm');

// Route::get('home', Welcome::class)->name('home');