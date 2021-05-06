<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AccountDetailController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FindRenterController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\CoHousingController;
use App\Http\Controllers\PersonController;

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
Route::get('/', function () {
    return view('home');
});

// ZOEKPORTAAL
Route::get('/cohousings', [CoHousingController::class, 'index'])->name('cohousings');
Route::get('/personen', [PersonController::class, 'index'])->name('persons');

// USER ACCOUNT DETAILS
Route::get('/user', [AccountDetailController::class, 'index'])->middleware('auth')->name('user');
Route::post('/store', [AccountDetailController::class, 'storeUserImage'])->middleware('auth');
Route::post('/birthplace', [AccountDetailController::class, 'updateBirthPlace'])->middleware('auth');
Route::post('/introtext', [AccountDetailController::class, 'updateIntroText'])->middleware('auth');
Route::post('/hobbies', [AccountDetailController::class, 'updateHobbies'])->middleware('auth');
Route::post('/status', [AccountDetailController::class, 'updateStatus'])->middleware('auth');

// SHOW USER PROFILE 
Route::get('/profile/{id}', [PublicProfileController::class, 'showProfile']);

// APPLICATION FORM
Route::get('/application', [ApplicationController::class, 'index'])->middleware('auth')->name('application');
Route::post('/publishpost', [ApplicationController::class, 'publish'])->middleware('auth')->name('publish');

// FIND A RENTER FORM
Route::get('/findrenter', [FindRenterController::class, 'index'])->middleware('auth')->name('findrenter');
Route::post('/publish', [FindRenterController::class, 'publish'])->middleware('auth')->name('publish');