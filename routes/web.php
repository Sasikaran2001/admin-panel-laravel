<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

Auth::routes();
/**
 * PUBLIC Routes (Users)
 */
Route::get('/', [EventController::class, 'index'])->name('user.events.index'); // User event listing page
Route::get('/event/{slug}', [EventController::class, 'show'])->name('user.events.show'); // Event detail page
Route::post('/booking/{eventId}', [BookingController::class, 'store'])->name('user.bookings.store'); // Book event

/**
 * ADMIN Routes
 */
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/events', [AdminEventController::class, 'index'])->name('admin.events.index');
    Route::get('/events/create', [AdminEventController::class, 'create'])->name('admin.events.create');
    Route::post('/events', [AdminEventController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/events/{event}', [AdminEventController::class, 'update'])->name('admin.events.update');
    Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])->name('admin.events.destroy');

    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    
});

/**
 * After Login - Redirect
 */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
