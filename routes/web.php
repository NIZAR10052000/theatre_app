<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/programme', [EventController::class, 'index'])->name('events.index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/ateliers', [PageController::class, 'ateliers'])->name('ateliers');

