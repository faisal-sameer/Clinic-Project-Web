<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reservation', [App\Http\Controllers\GuestController::class, 'reservation'])->name('reservation');
Route::get('/dashboardUser', [App\Http\Controllers\GuestController::class, 'dashboardUser'])->name('dashboardUser');
Route::get('/regester', [App\Http\Controllers\GuestController::class, 'regester'])->name('regester');
