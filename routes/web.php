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
Route::get('/', [App\Http\Controllers\UserController::class, 'welcome'])->name('welcome'); //
//Profile
Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'showProfile'])->name('profile');
Route::get('/my-profile/edit', [App\Http\Controllers\UserController::class, 'editProfile'])->middleware(['auth'])->name('edit_my_profile');
Route::put('/my-profile/save', [App\Http\Controllers\UserController::class, 'updateProfile'])->middleware(['auth'])->name('update_my_profile');
//Contact
Route::post('/profile/{id}/contact', [App\Http\Controllers\ContactController::class, 'sendMessage'])->middleware(['auth'])->name('contact');
Route::get('/inbox', [App\Http\Controllers\ContactController::class, 'getAllMessages'])->middleware(['auth'])->name('my_inbox');
Route::put('/inbox/status/{id}/update', [App\Http\Controllers\ContactController::class, 'changeStatusMessage'])->middleware(['auth'])->name('status_updated');
Route::post('/inbox/message/{id}/delete', [App\Http\Controllers\ContactController::class, 'deleteMessage'])->middleware(['auth'])->name('delete_message'); //delete method et pas post ?
//Route for the answer fonction to add HERE
//Booking
Route::post('/{id}/book', [App\Http\Controllers\BookingController::class, 'bookVisit'])->middleware(['auth'])->name('book_visit');
Route::get('/my-bookings', [App\Http\Controllers\BookingController::class, 'getAllBookings'])->middleware(['auth'])->name('my_bookings');
//Route::get('/my-bookings/{id}/show', [App\Http\Controllers\BookingController::class, 'showBooking'])->middleware(['auth'])->name('show_booking');
Route::post('/my-bookings/{id}/accept-offer', [App\Http\Controllers\BookingController::class, 'acceptOffer'])->middleware(['auth'])->name('accept_offer');
Route::post('/my-bookings/{id}/refuse-offer', [App\Http\Controllers\BookingController::class, 'refuseOffer'])->middleware(['auth'])->name('refuse_offer');
//Paiement - Stripe
Route::post('/my-bookings/{id}/stripe-payment', [App\Http\Controllers\StripeController::class, 'paymentStripe'])->name('stripe_payment');
//Article
Route::get('/add-article-form', [App\Http\Controllers\ArticleController::class, 'createArticle'])->middleware(['auth'])->name('add_article_form');
Route::post('/add-article', [App\Http\Controllers\ArticleController::class, 'storeArticle'])->middleware(['auth'])->name('add_article');
Route::get('/{id}/my-articles', [App\Http\Controllers\ArticleController::class, 'getAllMyArticles'])->name('my_articles');
Route::get('/show-article/{id}', [App\Http\Controllers\ArticleController::class, 'showArticle'])->name('show_article');
Route::get('/{id}/edit-article', [App\Http\Controllers\ArticleController::class, 'editArticle'])->middleware(['auth'])->name('edit_article');
Route::put('/{id}/save-article', [App\Http\Controllers\ArticleController::class, 'updateArticle'])->middleware(['auth'])->name('save_article');
//Comment
Route::post('/{id}/comment-article', [App\Http\Controllers\ArticleController::class, 'sendComment'])->middleware(['auth'])->name('comment_article');
//Favorite Article
Route::get('/{id}/article/my-favorite', [App\Http\Controllers\FavoriteController::class, 'getAllMyFavorite'])->middleware(['auth'])->name('my_favorite'); //Soit on laisse l'id afin que tous les users conenctés puissent voir les favoris des autres sinon que nous -meme y avons accès et pas les autres !?
Route::post('/{id}/article/like', [App\Http\Controllers\FavoriteController::class, 'likeArticle'])->middleware(['auth'])->name('like_article');
Route::post('/{id}/article/dislike', [App\Http\Controllers\FavoriteController::class, 'dislikeArticle'])->middleware(['auth'])->name('dislike_article');
//Favorite Guide
Route::post('/{id}/guide/like', [App\Http\Controllers\FavoriteController::class, 'likeGuide'])->middleware(['auth'])->name('like_guide');
Route::post('/{id}/guide/dislike', [App\Http\Controllers\FavoriteController::class, 'dislikeGuide'])->middleware(['auth'])->name('dislike_guide');
//Search
Route::get('/search-results/city', [App\Http\Controllers\ResearchController::class, 'getAll'])->name('all_in_city');


//where('id', '[0-9]+')->