<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

require __DIR__.'/auth.php';

//Home
Route::get('/', [App\Http\Controllers\UserController::class, 'welcome'])->name('welcome');
//Profile
Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'showProfile'])->name('profile');
Route::get('/my-profile/edit', [App\Http\Controllers\UserController::class, 'editProfile'])->middleware(['auth'])->name('edit_my_profile');
Route::put('/my-profile/save', [App\Http\Controllers\UserController::class, 'updateProfile'])->middleware(['auth'])->name('update_my_profile');
//Contact
Route::post('/profile/{id}/contact', [App\Http\Controllers\ContactController::class, 'sendMessage'])->middleware(['auth'])->name('contact');
Route::get('/inbox', [App\Http\Controllers\ContactController::class, 'getAllMessages'])->middleware(['auth'])->name('my_inbox');
Route::put('/inbox/status/{id}/update', [App\Http\Controllers\ContactController::class, 'changeStatusMessage'])->middleware(['auth'])->name('status_updated');//put ?
Route::post('/inbox/message/{id}/delete', [App\Http\Controllers\ContactController::class, 'deleteMessage'])->middleware(['auth'])->name('delete_message');
//Route for the answer fonction to add HERE
//Booking
Route::post('/{id}/book', [App\Http\Controllers\BookingController::class, 'bookVisit'])->middleware(['auth'])->name('book_visit');
Route::get('/my-bookings', [App\Http\Controllers\BookingController::class, 'getAllBookings'])->middleware(['auth'])->name('my_bookings');
//Route::get('/my-bookings/{id}/show', [App\Http\Controllers\BookingController::class, 'showBooking'])->middleware(['auth'])->name('show_booking');
Route::post('/{id}/accept-offer', [App\Http\Controllers\BookingController::class, 'acceptOffer'])->middleware(['auth'])->name('accept_offer');
Route::post('/{id}/refuse-offer', [App\Http\Controllers\BookingController::class, 'refuseOffer'])->middleware(['auth'])->name('refuse_offer');

//where('id', '[0-9]+')->