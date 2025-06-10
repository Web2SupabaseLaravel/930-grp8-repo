<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // راوتات البروفايل
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // راوتات جدول الطاولات (Table) مع Model Binding صحيح
    Route::get('tables', [TableController::class, 'index'])->name('tables.index');
    Route::get('tables/create', [TableController::class, 'create'])->name('tables.create');
    Route::post('tables', [TableController::class, 'store'])->name('tables.store');
    Route::get('tables/{table}/edit', [TableController::class, 'edit'])->name('tables.edit');
    Route::put('tables/{table}', [TableController::class, 'update'])->name('tables.update');
    Route::delete('tables/{table}', [TableController::class, 'destroy'])->name('tables.destroy');
});

require __DIR__.'/auth.php';

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TableController;

// Route::get('/dataTable', [App\Http\Controllers\TableController::class, 'index'])->name('dataTable.index');
// Route::resource('dataTable', App\Http\Controllers\TableController::class);

// //use App\Http\Controllers\TableController;

// //Route::resource('tables', TableController::class);

// //Route::resource('dataTable', TableController::class); 


// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

// require __DIR__.'/auth.php';
