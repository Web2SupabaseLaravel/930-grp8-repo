@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Cancellation Rate by Day of the Week</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>Day of the Week</th>
                <th>Total Cancellations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr class="text-center">
                    <td>{{ trim($row->day_of_week) }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
