<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RobotDashboardController;
use App\Http\Controllers\ChooseRobotModelController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Livewire\EditModalComponent;
use Livewire\Livewire;
use App\Http\Controllers\RobotsInfoController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/robot-information', [RobotDashboardController::class, 'getRobotInformation'])
        ->name('robot-information');
    Route::get('/robot-information/edit/{robotId}', [RobotDashboardController::class, 'edit'])
        ->name('robot-information.edit');
    Route::put('/robot-information/{robotId}', [RobotsInfoController::class, 'update'])
        ->name('robot-information.update');


});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/robot-information');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//after logout jump to confirmation
Route::get('/logout', [AuthenticatedSessionController::class, 'showLogoutConfirmation'])
    ->name('logout.confirmation');

// routes/web.php

Route::get('/robot-models', [ChooseRobotModelController::class, 'showModelChoices'])->name('robots.models');

Route::get('/images', 'ImagesController@resizeImage')->name('image.resize');

Livewire::component('edit-modal-component', EditModalComponent::class);