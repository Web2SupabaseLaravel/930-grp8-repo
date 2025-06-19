<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::resource('datareservation', ReservationController::class); 


        Route::view('/', 'welcome');

        Route::view('dashboard', 'dashboard')
           ->middleware(['auth', 'verified'])
           ->name('dashboard');

        Route::view('profile', 'profile')
           ->middleware(['auth'])
            ->name('profile');

        require __DIR__.'/auth.php';

#Route::get('/reservation', [ReservationController::class, 'index'])->name('request.index');



