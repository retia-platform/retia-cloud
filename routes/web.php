<?php

use App\Livewire\Configuration;
use App\Livewire\Dashboard;
use App\Livewire\Device;
use App\Livewire\Log;
use App\Livewire\Notification;
use App\Livewire\Report;
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
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Devices
    Route::get('/devices', Device::class)->name('devices');

    // Configurations
    Route::get('/configurations', Configuration::class)->name('configurations');

    // Reports
    Route::get('/reports', Report::class)->name('reports');

    // Logs
    Route::get('/logs', Log::class)->name('logs');

    // Notifications
    Route::get('/notifications', Notification::class)->name('notifications');
});
