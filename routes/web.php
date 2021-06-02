<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountDetailController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FindRenterController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\CoHousingController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ChatsController;

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



Auth::routes();

// HOMEPAGE
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/getcoordinates', [HomeController::class, 'getCoordinates']);
Route::post('/getmarkerdata', [HomeController::class, 'getMarkerData']);

// ZOEKPORTAAL
Route::get('/cohousings', [CoHousingController::class, 'index'])->name('cohousings');
Route::get('/cohousings/filterhouses', [CoHousingController::class, 'searchHouses'])->name('searchHouses');
Route::get('/cohousings/{id}', [CoHousingController::class, 'showHouseDetail']);
Route::post('/cohousings/getimages', [CoHousingController::class, 'getImages'])->name('getImages');

// FAVORITE POST
Route::post('/favorite', [FavoriteController::class, 'favoritePost'])->middleware('auth')->name('favorite');

// FIND PERSONS
Route::get('/personen', [PersonController::class, 'index'])->name('persons');
Route::post('/personen/filter', [PersonController::class, 'searchPersons'])->name('searchPersons');

// USER ACCOUNT DETAILS
Route::post('/store', [AccountDetailController::class, 'storeUserImage'])->middleware('auth');
Route::post('/birthplace', [AccountDetailController::class, 'updateBirthPlace'])->middleware('auth');
Route::post('/introtext', [AccountDetailController::class, 'updateIntroText'])->middleware('auth');
Route::post('/hobbies', [AccountDetailController::class, 'updateHobbies'])->middleware('auth');
Route::post('/status', [AccountDetailController::class, 'updateStatus'])->middleware('auth');

// APPLICATION FORM
Route::get('/application', [ApplicationController::class, 'index'])->middleware('auth')->name('application');
Route::post('/publishpost', [ApplicationController::class, 'publish'])->middleware('auth')->name('publish');

// FIND A RENTER FORM
Route::get('/findrenter', [FindRenterController::class, 'index'])->middleware('auth')->name('findrenter');
Route::post('/publish', [FindRenterController::class, 'publish'])->middleware('auth')->name('publish');

// ACCOUNT DASHBOARD
Route::get('/user/messages', [ChatsController::class, 'index'])->middleware('auth')->name('messages');
Route::get('/user/messages/fetch', [ChatsController::class, 'fetchMessages'])->middleware('auth');
Route::post('/user/messages/fetch', [ChatsController::class, 'sendMessage'])->middleware('auth');
Route::get('/profile/{id}', [PublicProfileController::class, 'showProfile'])->middleware('auth');
Route::get('/myapplications', [AccountController::class, 'showMyApplications'])->middleware('auth')->name('myapplications');
Route::get('/user', [AccountDetailController::class, 'index'])->middleware('auth')->name('user');
Route::get('/myfavorites', [AccountController::class, 'showFavorites'])->middleware('auth')->name('myfavorites');