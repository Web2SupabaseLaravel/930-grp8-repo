<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function reservationReportDaily()
    {
        $data = DB::table('Reservation')
            ->select(DB::raw('reservation_time::date as date'), DB::raw('COUNT(*) as total'))
            ->where('reservation_time', '>=', Carbon::now()->subDays(90))
            ->groupBy(DB::raw('reservation_time::date'))
            ->orderBy(DB::raw('reservation_time::date'))
            ->get();

        return view('admin.reports.reservations.daily', compact('data'));
    }
    public function reservationReportWeekly()
{
    $data = DB::table('Reservation')
        ->selectRaw("DATE_TRUNC('week', reservation_time)::date AS week_start, COUNT(*) AS total")
        ->where('reservation_time', '>=', now()->subWeeks(24))
        ->groupBy('week_start')
        ->orderBy('week_start')
        ->get();

    return view('admin.reports.reservations.weekly', compact('data'));
}



    public function reservationReportMonthly()
    {
        $data = DB::table('Reservation')
            ->selectRaw("TO_CHAR(reservation_time, 'YYYY-MM') AS month, COUNT(*) AS total")
            ->where('reservation_time', '>=', now()->subMonths(24))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.reports.reservations.monthly', compact('data'));
    }
public function tableOccupancyRateReport()
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

    return view('admin.reports.tables.occupancy_rate', compact('data'));
}


public function averageSeatingTimeReport()
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

    return view('admin.reports.tables.average_time', compact('data'));
}

    public function userReportByAddress()
    {
        $data = DB::table('User')
            ->select('address', DB::raw('COUNT(*) as total'))
            ->groupBy('address')
            ->orderByDesc('total')
            ->get();

        return view('admin.reports.users.by_address', compact('data'));
    }
    public function cancellationReportByDay()
    {
        $data = DB::table('Reservation')
            ->selectRaw("TO_CHAR(reservation_time, 'Day') as day_of_week, COUNT(*) as total")
            ->whereRaw('LOWER(status) = ?', ['cancelled'])
            ->groupBy('day_of_week')
            ->orderByRaw("MIN(EXTRACT(DOW FROM reservation_time))") 
            ->get();

        return view('admin.reports.cancellations.by_day', compact('data'));
    }

    public function noShowReportByTimeSlot()
{
    $data = DB::table('Reservation')
        ->select(DB::raw('EXTRACT(HOUR FROM reservation_time) as hour'), DB::raw('COUNT(*) as total'))
        ->whereRaw('LOWER(status) = ?', ['no-show'])
        ->groupBy('hour')
        ->orderBy('hour')
        ->get();

    return view('admin.reports.cancellations.no_show_by_hour', compact('data'));
}

public function userByAgeRange()
{
    $data = DB::table('User')
        ->selectRaw('
            CASE 
                WHEN birthdate IS NULL THEN \'Unknown\'
                WHEN DATE_PART(\'year\', AGE(birthdate)) BETWEEN 0 AND 17 THEN \'0-17\'
                WHEN DATE_PART(\'year\', AGE(birthdate)) BETWEEN 18 AND 24 THEN \'18-24\'
                WHEN DATE_PART(\'year\', AGE(birthdate)) BETWEEN 25 AND 34 THEN \'25-34\'
                WHEN DATE_PART(\'year\', AGE(birthdate)) BETWEEN 35 AND 44 THEN \'35-44\'
                WHEN DATE_PART(\'year\', AGE(birthdate)) BETWEEN 45 AND 54 THEN \'45-54\'
                ELSE \'55+\' 
            END AS age_range,
            COUNT(*) AS total
        ')
        ->groupBy('age_range')
        ->orderBy('age_range')
        ->get();

    return view('admin.reports.users.by_age_range', compact('data'));
}

public function userBySignupYear()
{
    $data = DB::table('User')
        ->select(DB::raw('signupyear as year'), DB::raw('COUNT(*) as total'))
        ->groupBy('signupyear')
        ->orderBy('signupyear')
        ->get();

    return view('admin.reports.users.by_signup_year', compact('data'));
}
public function dashboard()
{
    $total_users = DB::table('User')->count();
    $total_reservations = DB::table('Reservation')->count();
    $total_restaurants = DB::table('Restaurant')->count();

    return response()->json([
        'total_users' => $total_users,
        'total_reservations' => $total_reservations,
        'total_restaurants' => $total_restaurants,
    ]);
}


}
