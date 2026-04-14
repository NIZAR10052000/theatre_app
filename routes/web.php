<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::get('/programme', [EventController::class, 'index'])->name('events.index');
Route::get('/', function () {
    return view('welcome');
});
