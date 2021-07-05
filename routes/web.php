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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\AdsController::class, 'index']);

Auth::routes(['verify' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//displays ads according to categories
Route::get('/view-ads/{id}', [App\Http\Controllers\AdsController::class, 'viewAds']);

//link to post ads form
Route::get('/post-ads', [App\Http\Controllers\AdsController::class, 'postAds'])->middleware('auth');

//post ads
Route::post('/postedads', [App\Http\Controllers\AdsController::class, 'postedAds']);

//display search bar result
Route::post('/searchresult', [App\Http\Controllers\AdsController::class, 'searchResult']);

//display product details
Route::get('/product-details/{id}', [App\Http\Controllers\AdsController::class, 'productDetails']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//display user profile
// Route::get('/user-profile', [App\Http\Controllers\UsersController::class, 'index']);
Route::get('/user-profile', [App\Http\Controllers\UsersController::class, 'showInfo']);

//display user information
Route::get('/user-information', [App\Http\Controllers\UsersController::class, 'showInfo']);

//delete account
Route::post('/destroy-info', [App\Http\Controllers\UsersController::class, 'destroyInfo']);

//display users' ads
Route::get('/user-ads', [App\Http\Controllers\UsersController::class, 'showAds']);

//edit users' infomation
Route::post('/user-information', [App\Http\Controllers\UsersController::class, 'updateInfo']);

//page to edit users' ads
Route::get('/ads-details/{id}', [App\Http\Controllers\UsersController::class, 'editAd']);

//edit users' ads
Route::post('/ads-details/{id}', [App\Http\Controllers\UsersController::class, 'updateAd']);

//delete users' ad
Route::post('/destroy-ad/{id}', [App\Http\Controllers\UsersController::class, 'destroyAd']);
