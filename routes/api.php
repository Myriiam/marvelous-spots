<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Latest Articles Published
Route::get('/latest-articles', [App\Http\Controllers\Api\ArticleController::class, 'getLatestArticles'])->name('latest.articles');
//Guides (Latest Visits/bookings)  
Route::get('/latest-bookings/guides', [App\Http\Controllers\Api\BookingController::class, 'getLatestGuides'])->name('latest.guides');