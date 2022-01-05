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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {



        Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
        Route::post('/SendEmail', [App\Http\Controllers\HomeController::class, 'SendEmail'])->name('SendEmail');


        Auth::routes();

        Route::get('/dashboardContent', [App\Http\Controllers\ReceptionController::class, 'dashboardContent']);
        Route::get('/dashboardStatistic', [App\Http\Controllers\ReceptionController::class, 'dashboardStatistic']);

        Route::post('/dashboardContentUpdate', [App\Http\Controllers\ReceptionController::class, 'dashboardContentUpdate'])->name('Update');
        Route::post('/dashboardContentNew', [App\Http\Controllers\ReceptionController::class, 'dashboardContentNew'])->name('New');
        Route::post('/dashboardContentDelete', [App\Http\Controllers\ReceptionController::class, 'dashboardContentDelete'])->name('Delete');


        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/reservation', [App\Http\Controllers\GuestController::class, 'reservation'])->name('reservation');
        Route::any('/dashboardUser', [App\Http\Controllers\GuestController::class, 'dashboardUser'])->name('NewReservation');



        Route::post('/ApprovedApp', [App\Http\Controllers\GuestController::class, 'PatientApprovedModel'])->name('ApprovedApp');
        Route::post('/RejectApp', [App\Http\Controllers\GuestController::class, 'PatientRejectedModel'])->name('PatientRejected');

        Route::get('/ApprovedApp-{id}', [App\Http\Controllers\GuestController::class, 'PatientApproved']);
        Route::get('/RejectedApp-{id}', [App\Http\Controllers\GuestController::class, 'PatientRejected']);



        Route::any('/regester', [App\Http\Controllers\GuestController::class, 'regester'])->name('Appointment');
        Route::any('/NewAppointment', [App\Http\Controllers\GuestController::class, 'AppointmentNew'])->name('NewAppointment');
        Route::any('/ChangeApp', [App\Http\Controllers\GuestController::class, 'ChangeApp'])->name('ChangeApp');

        // Appointments Dashboard 
        Route::get('/TodayAppointments', [App\Http\Controllers\ReceptionController::class, 'dashboardClinicToday']);
        Route::get('/PastAppointments', [App\Http\Controllers\ReceptionController::class, 'dashboardClinicPast']);
        Route::get('/FutureAppointments-{date}', [App\Http\Controllers\ReceptionController::class, 'dashboardClinicFuture']);
        Route::post('/getFreeDate', [App\Http\Controllers\ReceptionController::class, 'getFreeDate'])->name('FreeData');

        // Action is Appointment Dashboard 
        Route::any('/Rejected', [App\Http\Controllers\ReceptionController::class, 'Rejected'])->name('Rejected');
        Route::any('/Coming', [App\Http\Controllers\ReceptionController::class, 'Coming'])->name('Coming');
        Route::any('/DidCome', [App\Http\Controllers\ReceptionController::class, 'DidCome'])->name('DidCome');
        Route::any('/Confirm', [App\Http\Controllers\ReceptionController::class, 'Confirm'])->name('Confirm');
        Route::any('/Complete', [App\Http\Controllers\ReceptionController::class, 'Complete'])->name('Complete');
        Route::any('/Leave', [App\Http\Controllers\ReceptionController::class, 'Leave'])->name('Leave');
        Route::any('/WithOutApp', [App\Http\Controllers\ReceptionController::class, 'WithoutAppointment'])->name('WithOutApp');
        Route::any('/NewAppointmentStaff', [App\Http\Controllers\ReceptionController::class, 'NewAppointmentStaff'])->name('NewAppointmentStaff');
    }
);
