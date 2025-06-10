@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Table Occupancy Report</h2>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Restaurant</th>
                <th>Table Number (in Restaurant)</th>
                <th>Total Reservations</th>
                <th>Confirmed Reservations</th>
                <th>Occupancy Rate (%)</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $row)
                <tr>
                    <td>{{ $row->restaurant_name }}</td>
                    <td>{{ $row->table_number }}</td>
                    <td>{{ $row->total_reservations }}</td>
                    <td>{{ $row->confirmed_reservations }}</td>
                    <td>{{ $row->occupancy_rate }}%</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No data available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
