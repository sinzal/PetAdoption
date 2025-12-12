<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use Illuminate\Http\Request; // Added for the Admin login closure

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/adoption', function () {
    $pets = App\Models\Pet::where('is_available', true)->get();
    return view('adoption', compact('pets'));
})->name('adoption');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

// UPDATED: Now points to the PetController method
Route::get('/productdetail1/{id?}', [PetController::class, 'showProductDetail'])->name('productdetail1');

// Admin routes for Pet CRUD
Route::resource('pets', PetController::class);

use App\Http\Controllers\AdoptionController;

Route::post('/adoption/submit', [AdoptionController::class, 'submit'])->name('adoption.submit');


// Admin dashboard
Route::get('/admin', function () {
    $pets = App\Models\Pet::all();
    return view('admin.dashboard', compact('pets'));
})->name('admin.dashboard');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    $password = $request->input('password');
    if ($password === env('ADMIN_PASSWORD', 'admin123')) {
        session(['admin_logged_in' => true]);
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['password' => 'Invalid password']);
})->name('admin.login.submit');

Route::get('/admin/logout', function () {
    session()->forget('admin_logged_in');
    return redirect()->route('admin.login');
})->name('admin.logout');

Route::get('/search-pets', [App\Http\Controllers\PetController::class, 'search'])->name('pets.search');