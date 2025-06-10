<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TableApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('tables', TableApiController::class);
//Route::post('/tables', [TableApiController::class, 'index'])->name('request.index');

























/*use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableApiController;

Route::get('/tables', [TableApiController::class, 'index']);
Route::post('/tables', [TableApiController::class, 'store']);
Route::get('/tables/{id}', [TableApiController::class, 'show']);
Route::put('/tables/{id}', [TableApiController::class, 'update']);
Route::delete('/tables/{id}', [TableApiController::class, 'destroy']);*/
