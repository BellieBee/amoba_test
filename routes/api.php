<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CalendarDayDisabledController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteDataController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# User Routes
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::post('/user/plan', [UserPlanController::class, 'store'])->name('user.plan.store');

# Route Routes
Route::post('/route', [RouteController::class, 'store'])->name('route.store');
Route::post('/route/data', [RouteDataController::class, 'store'])->name('route.data.store');

#Calendar Routes
Route::get('/calendar/search/start/{start_date}/end/{end_date}', [CalendarController::class, 'search'])->name('calendar.search');
Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::post('/calendar/day/disabled', [CalendarDayDisabledController::class, 'store'])->name('calendar.day.disable');

#Service Routes
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');

#Reservation Routes
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
