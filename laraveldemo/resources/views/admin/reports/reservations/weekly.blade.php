@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📊 Weekly Reservations (Last 12 Weeks)</h2>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Week Starting</th>
                <th>Total Reservations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row->week_start)->format('Y-m-d') }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
