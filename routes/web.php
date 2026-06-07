<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/planning', function () {
    return view('planning.index');
})->name('planning');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('clients', ClientController::class)->middleware(['auth', 'verified']);

Route::resource('services', ServiceController::class)->middleware(['auth', 'verified']);

Route::put('/clients/{client}/photo', [ClientController::class, 'updatePhoto'])->name('clients.update.photo');

require __DIR__.'/auth.php';
