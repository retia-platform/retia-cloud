<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

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

Route::get('health', HealthCheckResultsController::class)->name('health');

Route::get('/', function () {
    return redirect(RouteServiceProvider::HOME);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', \App\Livewire\Dashboard\Index::class)->name('dashboard');

    // Detectors
    Route::prefix('detectors')->group(function () {
        Route::get('/', \App\Livewire\Detector\Index::class)->name('detectors');
        Route::get('detail', \App\Livewire\Device\Detail::class)->name('detectors.detail');
        Route::get('store', \App\Livewire\Device\Store::class)->name('detectors.store');
        Route::get('update', \App\Livewire\Device\Update::class)->name('detectors.update');
    });

    // Devices
    Route::prefix('devices')->group(function () {
        Route::get('/', \App\Livewire\Device\Index::class)->name('devices');
        Route::get('detail', \App\Livewire\Device\Detail::class)->name('devices.detail');
        Route::get('store', \App\Livewire\Device\Store::class)->name('devices.store');
        Route::get('update', \App\Livewire\Device\Update::class)->name('devices.update');
    });

    // Logs
    Route::prefix('logs')->group(function () {
        Route::get('/', \App\Livewire\Log\Index::class)->name('logs');
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', \App\Livewire\Log\Index::class)->name('users');
    });

    // Notifications
    Route::prefix('notifications')->group(function () {
        Route::get('/', \App\Livewire\Notification\Index::class)->name('notifications');
    });
});
