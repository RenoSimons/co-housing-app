<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AccountDetailController;

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

// USER ACCOUNT DETAILS
Route::get('/user', [AccountDetailController::class, 'index'])->middleware('auth')->name('user');
Route::post('/store', [AccountDetailController::class, 'storeUserImage'])->middleware('auth');
Route::post('/birthplace', [AccountDetailController::class, 'updateBirthPlace'])->middleware('auth');
Route::post('/introtext', [AccountDetailController::class, 'updateIntroText'])->middleware('auth');
Route::post('/hobbies', [AccountDetailController::class, 'updateHobbies'])->middleware('auth');
Route::post('/status', [AccountDetailController::class, 'updateStatus'])->middleware('auth');
