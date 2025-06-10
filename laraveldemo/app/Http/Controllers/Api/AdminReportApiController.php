<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class AdminReportApiController extends Controller
{
    public function index(): JsonResponse
    {
        $summary = [
            'total_users' => DB::table('User')->count(),
            'total_restaurants' => DB::table('Restaurant')->count(),
            'total_reservations' => DB::table('Reservation')->count(),
        ];

        $reports = [
            ['name' => 'Daily Reservations', 'key' => 'reservations_daily', 'url' => route('reports.reservations.daily')],
            ['name' => 'Weekly Reservations', 'key' => 'reservations_weekly', 'url' => route('reports.reservations.weekly')],
            ['name' => 'Monthly Reservations', 'key' => 'reservations_monthly', 'url' => route('reports.reservations.monthly')],
            ['name' => 'Table Occupancy', 'key' => 'tables_occupancy', 'url' => route('reports.tables.occupancy')],
            ['name' => 'Average Seating Time', 'key' => 'tables_avg_time', 'url' => route('reports.tables.avg_time')],
            ['name' => 'Users by Address', 'key' => 'users_by_address', 'url' => route('reports.users.by_address')],
            ['name' => 'Cancellations by Day', 'key' => 'cancellations_by_day', 'url' => route('reports.cancellations.by_day')],
            ['name' => 'No-shows by Hour', 'key' => 'no_show_by_hour', 'url' => route('reports.no_show_by_hour')],
            ['name' => 'Users by Age Range', 'key' => 'users_by_age_range', 'url' => route('reports.users.by_age_range')],
            ['name' => 'Users by Signup Year', 'key' => 'users_by_signup_year', 'url' => route('reports.users.by_signup_year')],
        ];

        return response()->json([
            'summary' => $summary,
            'reports' => $reports
        ]);
    }
    public function usersCount(): JsonResponse
    {
        $total = DB::table('User')->count();
        return response()->json(['total' => $total]);
    }

    public function restaurantsCount(): JsonResponse
    {
        $total = DB::table('Restaurant')->count();
        return response()->json(['total' => $total]);
    }

    public function reservationsCount(): JsonResponse
    {
        $total = DB::table('Reservation')->count();
        return response()->json(['total' => $total]);
    }

    public function dailyReservations(): JsonResponse
    {
        $data = DB::table('Reservation')
            ->select(DB::raw('reservation_time::date as date'), DB::raw('COUNT(*) as total'))
            ->where('reservation_time', '>=', Carbon::now()->subDays(90))
            ->groupBy(DB::raw('reservation_time::date'))
            ->orderBy(DB::raw('reservation_time::date'))
            ->get();

        return response()->json($data);
    }

    public function weeklyReservations(): JsonResponse
    {
        $data = DB::table('Reservation')
            ->selectRaw("DATE_TRUNC('week', reservation_time)::date AS week_start, COUNT(*) AS total")
            ->where('reservation_time', '>=', now()->subWeeks(24))
            ->groupBy('week_start')
            ->orderBy('week_start')
            ->get();

        return response()->json($data);
    }

    public function monthlyReservations(): JsonResponse
    {
        $data = DB::table('Reservation')
            ->selectRaw("TO_CHAR(reservation_time, 'YYYY-MM') AS month, COUNT(*) AS total")
            ->where('reservation_time', '>=', now()->subMonths(24))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json($data);
    }

    public function tableOccupancy(): JsonResponse
    {
        $data = DB::table(DB::raw('"Reservation"'))
            ->join(DB::raw('"Restaurant"'), DB::raw('"Reservation"."resturant-id"'), '=', DB::raw('"Restaurant"."restaurant_id"'))
            ->select(
                DB::raw('"Reservation"."table_number"'),
                DB::raw('"Reservation"."resturant-id" as restaurant_id'),
                DB::raw('"Restaurant"."name" as restaurant_name'),
                DB::raw('COUNT(*) as total_reservations'),
                DB::raw("SUM(CASE WHEN \"Reservation\".\"status\" = 'confirmed' THEN 1 ELSE 0 END) as confirmed_reservations"),
                DB::raw("ROUND((SUM(CASE WHEN \"Reservation\".\"status\" = 'confirmed' THEN 1 ELSE 0 END)::decimal / COUNT(*) * 100), 2) as occupancy_rate")
            )
            ->groupBy(
                DB::raw('"Reservation"."table_number"'),
                DB::raw('"Reservation"."resturant-id"'),
                DB::raw('"Restaurant"."name"')
            )
            ->having(DB::raw("SUM(CASE WHEN \"Reservation\".\"status\" = 'confirmed' THEN 1 ELSE 0 END)"), '>', 0)
            ->orderBy('occupancy_rate', 'desc')
            ->get();

        return response()->json($data);
    }

   public function averageSeatingTime(): JsonResponse
{
    $data = DB::table('Reservation')
        ->join('Restaurant', 'Reservation.resturant-id', '=', 'Restaurant.restaurant_id')
        ->select(
            'Reservation.resturant-id as restaurant_id',
            'Restaurant.name as restaurant_name',
            'Reservation.table_number',
            DB::raw('AVG(EXTRACT(EPOCH FROM (end_time - reservation_time)) / 60) as avg_minutes')
        )
        ->whereNotNull('end_time')
        ->groupBy('Reservation.resturant-id', 'Restaurant.name', 'Reservation.table_number')
        ->orderBy('restaurant_name')
        ->orderBy('Reservation.table_number')
        ->get();

    return response()->json($data);
}


    public function usersByAddress(): JsonResponse
    {
        $data = DB::table('User')
            ->select('address', DB::raw('COUNT(*) as total'))
            ->groupBy('address')
            ->orderByDesc('total')
            ->get();

        return response()->json($data);
    }

    public function cancellationsByDay(): JsonResponse
    {
        $data = DB::table('Reservation')
            ->selectRaw("TO_CHAR(reservation_time, 'Day') as day_of_week, COUNT(*) as total")
            ->whereRaw('LOWER(status) = ?', ['cancelled'])
            ->groupBy('day_of_week')
            ->orderByRaw("MIN(EXTRACT(DOW FROM reservation_time))")
            ->get();

        return response()->json($data);
    }

    public function noShowByHour(): JsonResponse
    {
        $data = DB::table('Reservation')
            ->select(DB::raw('EXTRACT(HOUR FROM reservation_time) as hour'), DB::raw('COUNT(*) as total'))
            ->whereRaw('LOWER(status) = ?', ['no-show'])
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        return response()->json($data);
    }

    public function usersByAgeRange(): JsonResponse
    {
        $data = DB::table('User')
            ->selectRaw("
                CASE 
                    WHEN birthdate IS NULL THEN 'Unknown'
                    WHEN DATE_PART('year', AGE(birthdate)) BETWEEN 0 AND 17 THEN '0-17'
                    WHEN DATE_PART('year', AGE(birthdate)) BETWEEN 18 AND 24 THEN '18-24'
                    WHEN DATE_PART('year', AGE(birthdate)) BETWEEN 25 AND 34 THEN '25-34'
                    WHEN DATE_PART('year', AGE(birthdate)) BETWEEN 35 AND 44 THEN '35-44'
                    WHEN DATE_PART('year', AGE(birthdate)) BETWEEN 45 AND 54 THEN '45-54'
                    ELSE '55+'
                END AS age_range,
                COUNT(*) AS total
            ")
            ->groupBy('age_range')
            ->orderBy('age_range')
            ->get();

        return response()->json($data);
    }

    public function usersBySignupYear(): JsonResponse
    {
        $data = DB::table('User')
            ->select(DB::raw('signupyear as year'), DB::raw('COUNT(*) as total'))
            ->groupBy('signupyear')
            ->orderBy('signupyear')
            ->get();

        return response()->json($data);
    }
}
