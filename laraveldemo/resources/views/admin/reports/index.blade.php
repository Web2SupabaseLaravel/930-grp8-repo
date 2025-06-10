@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reservation Volume Report</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-info">
                <strong>Daily Reservations:</strong> {{ $daily }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="alert alert-warning">
                <strong>Last 7 Days:</strong> {{ $weekly }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="alert alert-success">
                <strong>Last 30 Days:</strong> {{ $monthly }}
            </div>
        </div>
    </div>
</div>
@endsection
