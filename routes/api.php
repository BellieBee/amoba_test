<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteDataController;
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
Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
