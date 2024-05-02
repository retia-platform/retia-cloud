<?php

use App\Notifications\LogoutNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Contracts\LogoutResponse;
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

// Root Route
Route::get('/', function () {
    return redirect(route('login'));
});

// Authenticated Endpoints
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Health Checks
    Route::get('health', HealthCheckResultsController::class)->name('health');

    // Sessions
    Route::get('logout', function (Request $request) {
        $request->user()->notify(new LogoutNotification());

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return app(LogoutResponse::class);
    });

    // Notifications
    Route::prefix('notifications')->group(function () {
        Route::get('/', \App\Livewire\Notification\Index::class)->name('notifications');
    });

    // Dashboard
    Route::get('dashboard', \App\Livewire\Dashboard\Index::class)->name('dashboard');

    // Devices
    Route::prefix('devices')->group(function () {
        Route::get('/', \App\Livewire\Device\Index::class)->name('devices');
        Route::get('detail', \App\Livewire\Device\Detail::class)->name('devices.detail');
        Route::get('store1', \App\Livewire\Device\Store1::class)->name('devices.store1');
        Route::get('store2', \App\Livewire\Device\Store2::class)->name('devices.store2');
        Route::get('store3', \App\Livewire\Device\Store3::class)->name('devices.store3');
        Route::get('store4', \App\Livewire\Device\Store4::class)->name('devices.store4');
        Route::get('store5', \App\Livewire\Device\Store5::class)->name('devices.store5');
        Route::get('store6', \App\Livewire\Device\Store6::class)->name('devices.store6');
        Route::get('store7', \App\Livewire\Device\Store7::class)->name('devices.store7');
        Route::get('update', \App\Livewire\Device\Update::class)->name('devices.update');
    });

    // Detectors
    Route::prefix('detectors')->group(function () {
        Route::get('/', \App\Livewire\Detector\Index::class)->name('detectors');
        Route::get('detail', \App\Livewire\Device\Detail::class)->name('detectors.detail');
        Route::get('store', \App\Livewire\Device\Store1::class)->name('detectors.store');
        Route::get('update', \App\Livewire\Device\Update::class)->name('detectors.update');
    });

    // Logs
    Route::prefix('logs')->group(function () {
        Route::get('/', \App\Livewire\Log\Index::class)->name('logs');
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', \App\Livewire\User\Index::class)->name('users');
        Route::get('detail', \App\Livewire\User\Detail::class)->name('users.detail');
        Route::get('store', \App\Livewire\User\Store::class)->name('users.store');
        Route::get('update', \App\Livewire\User\Update::class)->name('users.update');
    });
});
