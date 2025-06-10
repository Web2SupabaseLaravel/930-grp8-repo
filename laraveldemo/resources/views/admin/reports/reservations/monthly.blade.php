@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📅 Monthly Reservation Report</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Month</th>
                <th>Total Reservations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->month }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
