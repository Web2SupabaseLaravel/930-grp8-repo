<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ApiUserController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:api')->group(function () {


    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    Route::get('/users', [ApiUserController::class, 'index']);
    Route::get('/users/{user_id}', [ApiUserController::class, 'show']);
    Route::put('/users/{user_id}', [ApiUserController::class, 'update']);
    Route::delete('/users/{user_id}', [ApiUserController::class, 'destroy']);
});
