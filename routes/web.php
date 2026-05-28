<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    //Rutas del Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AppointmentController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    //Rutas de Citas
    Route::controller(AppointmentController::class)->group(function () {
        Route::get('/appointments/create', 'create')->name('appointments.create');
        Route::post('/appointments', 'store')->name('appointments.store');
    });
});



require __DIR__ . '/auth.php';
