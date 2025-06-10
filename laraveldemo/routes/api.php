<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantApiController;
use App\Http\Controllers\Api\AdminReportApiController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/restaurants', [\App\Http\Controllers\Api\RestaurantApiController::class, 'store']);
Route::middleware('auth:api')->group(function () {

    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::get('/admin/reports/users/count', [AdminReportApiController::class, 'usersCount'])->name('reports.users.count');
    Route::get('/admin/reports/restaurants/count', [AdminReportApiController::class, 'restaurantsCount'])->name('reports.restaurants.count');
    Route::get('/admin/reports/reservations/count', [AdminReportApiController::class, 'reservationsCount'])->name('reports.reservations.count');

    Route::get('/admin/reports', [AdminReportApiController::class, 'index'])->name('reports.index');
    Route::get('/admin/reports/reservations/daily', [AdminReportApiController::class, 'dailyReservations'])->name('reports.reservations.daily');
    Route::get('/admin/reports/reservations/weekly', [AdminReportApiController::class, 'weeklyReservations'])->name('reports.reservations.weekly');
    Route::get('/admin/reports/reservations/monthly', [AdminReportApiController::class, 'monthlyReservations'])->name('reports.reservations.monthly');
    Route::get('/admin/reports/tables/occupancy', [AdminReportApiController::class, 'tableOccupancy'])->name('reports.tables.occupancy');
    Route::get('/admin/reports/tables/avg-time', [AdminReportApiController::class, 'averageSeatingTime'])->name('reports.tables.avg_time');
    Route::get('/admin/reports/users/by-address', [AdminReportApiController::class, 'usersByAddress'])->name('reports.users.by_address');
    Route::get('/admin/reports/cancellations/by-day', [AdminReportApiController::class, 'cancellationsByDay'])->name('reports.cancellations.by_day');
    Route::get('/admin/reports/cancellations/no-show-by-hour', [AdminReportApiController::class, 'noShowByHour'])->name('reports.no_show_by_hour');
    Route::get('/admin/reports/users/by-age-range', [AdminReportApiController::class, 'usersByAgeRange'])->name('reports.users.by_age_range');
    Route::get('/admin/reports/users/by-signup-year', [AdminReportApiController::class, 'usersBySignupYear'])->name('reports.users.by_signup_year');
});
