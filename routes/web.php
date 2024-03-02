<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

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

    // Devices
    Route::prefix('devices')->group(function () {
        Route::get('/', \App\Livewire\Device\Index::class)->name('devices');
        Route::get('detail', \App\Livewire\Device\Detail::class)->name('devices.detail');
        Route::get('store', \App\Livewire\Device\Store::class)->name('devices.store');
        Route::get('update', \App\Livewire\Device\Update::class)->name('devices.update');
    });

    // Configurations
    Route::prefix('configurations')->group(function () {
        Route::get('/', \App\Livewire\Configuration\Index::class)->name('configurations');
    });

    // Reports
    Route::prefix('reports')->group(function () {
        Route::get('/', \App\Livewire\Report\Index::class)->name('reports');
    });

    // Logs
    Route::prefix('logs')->group(function () {
        Route::get('/', \App\Livewire\Log\Index::class)->name('logs');
    });

    // Notifications
    Route::prefix('notifications')->group(function () {
        Route::get('/', \App\Livewire\Notification\Index::class)->name('notifications');
    });
});
