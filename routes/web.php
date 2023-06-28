<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RobotDashboardController;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/robot-information', [RobotDashboardController::class, 'getRobotInformation'])
        ->name('robot-information');

});

//after logout jump to confirmation
Route::get('/logout', [AuthenticatedSessionController::class, 'showLogoutConfirmation'])
    ->name('logout.confirmation');



Route::get('/images', 'ImagesController@resizeImage')->name('image.resize');