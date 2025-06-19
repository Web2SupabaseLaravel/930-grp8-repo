<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;


Route::get('/restaurant', [RestaurantController::class, 'index']);
Route::post('/restaurant', [RestaurantController::class, 'store']);

