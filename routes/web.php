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

// Médiathèque & Contenu
Route::get('/mediatheque', [App\Http\Controllers\MediaController::class, 'index'])->name('media.index');
Route::get('/ateliers-formations', [App\Http\Controllers\MediaController::class, 'ateliers'])->name('media.ateliers');

// Routes Administration (Réelles)
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/validate-troupe/{id}', [App\Http\Controllers\AdminController::class, 'validateTroupe'])->name('admin.validate-troupe');
    Route::post('/reject-troupe/{id}', [App\Http\Controllers\AdminController::class, 'rejectTroupe'])->name('admin.reject-troupe');
    Route::post('/approve-event/{id}', [App\Http\Controllers\AdminController::class, 'approveEvent'])->name('admin.approve-event');
    
    // CRUD Événements Admin
    Route::post('/events', [App\Http\Controllers\AdminController::class, 'storeEvent'])->name('admin.events.store');
    Route::put('/events/{id}', [App\Http\Controllers\AdminController::class, 'updateEvent'])->name('admin.events.update');
    Route::delete('/events/{id}', [App\Http\Controllers\AdminController::class, 'destroyEvent'])->name('admin.events.destroy');
    
    // Gestion Médias Admin
    Route::post('/approve-media/{id}', [App\Http\Controllers\MediaController::class, 'approve'])->name('admin.approve-media');
    Route::delete('/media/{id}', [App\Http\Controllers\MediaController::class, 'destroy'])->name('admin.delete-media');
});

// Routes Troupe (Espace Atelier)
Route::prefix('atelier')->middleware('verified_troupe')->group(function () {
    Route::get('/medias', [App\Http\Controllers\MediaController::class, 'manage'])->name('troupe.medias');
    Route::post('/medias', [App\Http\Controllers\MediaController::class, 'store'])->name('troupe.medias.store');
});
