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

//Profile
Route::get('/', [App\Http\Controllers\UserController::class, 'welcome'])->name('welcome');
Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'showProfile'])->name('profile');
Route::get('/my-profile/edit', [App\Http\Controllers\UserController::class, 'editProfile'])->middleware(['auth'])->name('edit_my_profile');
Route::put('/my-profile/save', [App\Http\Controllers\UserController::class, 'updateProfile'])->middleware(['auth'])->name('update_my_profile');
Route::post('/profile/{id}/contact', [App\Http\Controllers\ContactController::class, 'sendMessage'])->name('contact');
Route::get('/inbox', [App\Http\Controllers\ContactController::class, 'index'])->name('my_inbox');

//where('id', '[0-9]+')->