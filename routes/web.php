<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/programme', [EventController::class, 'index'])->name('events.index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/ateliers', [PageController::class, 'ateliers'])->name('ateliers');

// Routes Maquettes (GET)
Route::get('/maquettes/connexion', [App\Http\Controllers\MockupController::class, 'login'])->name('mockups.login');
Route::get('/maquettes/inscription', [App\Http\Controllers\MockupController::class, 'register'])->name('mockups.register');

// Protection du dashboard troupe (Exemple)
Route::get('/maquettes/troupe/dashboard', [App\Http\Controllers\MockupController::class, 'troupeDashboard'])
    ->middleware('verified_troupe')
    ->name('mockups.troupe-dashboard');

// Routes Maquettes (POST) pour simuler le flux
Route::post('/maquettes/connexion', [App\Http\Controllers\MockupController::class, 'processLogin']);
Route::post('/maquettes/inscription', [App\Http\Controllers\MockupController::class, 'processRegister']);
Route::post('/logout', [App\Http\Controllers\MockupController::class, 'logout'])->name('logout');

// Routes Administration (Réelles)
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/validate-troupe/{id}', [App\Http\Controllers\AdminController::class, 'validateTroupe'])->name('admin.validate-troupe');
    Route::post('/reject-troupe/{id}', [App\Http\Controllers\AdminController::class, 'rejectTroupe'])->name('admin.reject-troupe');
    Route::post('/approve-event/{id}', [App\Http\Controllers\AdminController::class, 'approveEvent'])->name('admin.approve-event');
});
