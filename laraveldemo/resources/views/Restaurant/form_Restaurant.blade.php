@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($Restaurant->id) ? 'Edit Restaurant' : 'Add New Restaurant' }}</h2>

    <form action="{{ $route }}" method="POST">
        @csrf
        @if($method === 'put')
            @method('PUT')
        @endif
        <div class="mb-3">
        <label for="restaurant_id" class="form-label">Restaurant ID</label>
        <input type="text" class="form-control" name="restaurant_id" value="{{ old('restaurant_id', $Restaurant->restaurant_id) }}" required>
         </div>

        <div class="mb-3">
            <label for="name" class="form-label">Restaurant Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $Restaurant->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" name="country" value="{{ old('country', $Restaurant->country) }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" name="city" value="{{ old('city', $Restaurant->city) }}" required>
        </div>

        <div class="mb-3">
            <label for="street" class="form-label">Street</label>
            <input type="text" class="form-control" name="street" value="{{ old('street', $Restaurant->street) }}" required>
        </div>

        <div class="mb-3">
            <label for="building" class="form-label">Building</label>
            <input type="text" class="form-control" name="building" value="{{ old('building', $Restaurant->building) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $Restaurant->phone_number) }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" value="{{ old('category', $Restaurant->category) }}" required>
        </div>

        <div class="mb-3">
            <label for="open_time" class="form-label">Opening Time</label>
            <input type="time" class="form-control" name="open_time" value="{{ old('open_time', $Restaurant->open_time) }}" required>
        </div>

        <div class="mb-3">
            <label for="close_time" class="form-label">Closing Time</label>
            <input type="time" class="form-control" name="close_time" value="{{ old('close_time', $Restaurant->close_time) }}" required>
        </div>

        <div class="mb-3">
            <label for="seating_capacity" class="form-label">Seating Capacity</label>
            <input type="number" class="form-control" name="seating_capacity" value="{{ old('seating_capacity', $Restaurant->seating_capacity) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $method === 'put' ? 'Update' : 'Save' }}
        </button>
    </form>
</div>
@endsection
