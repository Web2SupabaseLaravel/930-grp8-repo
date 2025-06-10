<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\Api\RestaurantApiController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('admin.reports');
    });

    Route::get('/admin/reports', [AdminReportController::class, 'index'])->name('admin.reports');

    Route::prefix('admin/reports')->group(function () {
        Route::get('/reservations/daily', [AdminReportController::class, 'reservationReportDaily'])->name('reports.daily_reservations');
        Route::get('/reservations/weekly', [AdminReportController::class, 'reservationReportWeekly'])->name('reports.weekly_reservations');
        Route::get('/reservations/monthly', [AdminReportController::class, 'reservationReportMonthly'])->name('reports.monthly_reservations');
        Route::get('/reservations/peak-times', [AdminReportController::class, 'reservationReportPeakTimes'])->name('reports.peak_reservations');
        Route::get('/tables/occupancy_rate', [AdminReportController::class, 'tableOccupancyRateReport'])->name('reports.table_occupancy_rate');
        Route::get('/users/by_address', [AdminReportController::class, 'userReportByAddress'])->name('reports.users_by_address');
        Route::get('/cancellations/by_day', [AdminReportController::class, 'cancellationReportByDay'])->name('reports.cancellations_by_day');
        Route::get('/cancellations/no_show_by_hour', [AdminReportController::class, 'noShowReportByTimeSlot'])->name('reports.no_show_by_hour');
        Route::get('/users/by_age_range', [AdminReportController::class, 'userByAgeRange'])->name('reports.users_by_age_range');
        Route::get('/users/by_signup_year', [AdminReportController::class, 'userBySignupYear'])->name('reports.users_by_signupyear');
        Route::get('/tables/average_time', [AdminReportController::class, 'averageSeatingTimeReport'])->name('reports.table_average_time');

    });
             
    Route::resource('datarestaurant', RestaurantController::class);

    Route::view('dashboard', 'dashboard')->middleware(['verified'])->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

Route::view('/', 'welcome');

require __DIR__.'/auth.php';
