<table class="table table-striped table-hover">
    <thead class="table-dark text-center">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Country</th>
            <th>City</th>
            <th>Street</th>
            <th>Building</th>
            <th>Phone</th>
            <th>Open</th>
            <th>Close</th>
            <th>Capacity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($restaurants as $restaurant)
            <tr class="text-center align-middle">
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->category }}</td>
                <td>{{ $restaurant->country }}</td>
                <td>{{ $restaurant->city }}</td>
                <td>{{ $restaurant->street }}</td>
                <td>{{ $restaurant->building }}</td>
                <td>{{ $restaurant->phone_number }}</td>
                <td>{{ $restaurant->open_time }}</td>
                <td>{{ $restaurant->close_time }}</td>
                <td>{{ $restaurant->seating_capacity }}</td>
                <td>
                    <a href="{{ route('datarestaurant.edit', $restaurant->restaurant_id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>

                    <form action="{{ route('datarestaurant.destroy', $restaurant->restaurant_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        @if($restaurants->isEmpty())
            <tr><td colspan="11" class="text-center">No restaurants found.</td></tr>
        @endif
    </tbody>
</table>
