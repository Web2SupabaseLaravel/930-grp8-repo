<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




#Route::apiResource('reservation', ReservationControler::class);
Route::get('/reservation', [ReservationController::class, 'index'])->name('request.index');
Route::post('/reservation', [ReservationController::class, 'store'])->name('request.store');
#Route::delete('/reservation/{reservationid}', [ReservationController::class, 'destroy'])->name('request.destroy');
#Route::update('/reservation/{reservationid}', [ReservationController::class, 'update'])->name('request.update');


