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

Route::post('login',  [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::get('Services',  [App\Http\Controllers\Api\GuestController::class, 'Services']);
Route::post('NewAppointment',  [App\Http\Controllers\Api\GuestController::class, 'AppointmentNew']);
Route::post('UpdateAppointment',  [App\Http\Controllers\Api\GuestController::class, 'UpdatingAppointment']);
Route::post('dashboardUser',  [App\Http\Controllers\Api\GuestController::class, 'dashboardUser']);
Route::post('ClinicAppointments',  [App\Http\Controllers\Api\ReceptionController::class, 'Appointments']);
Route::post('AcceptedAppointments',  [App\Http\Controllers\Api\ReceptionController::class, 'AppointmentsAccepted']);
Route::post('ArrivePatient',  [App\Http\Controllers\Api\ReceptionController::class, 'PatientArrive']);
