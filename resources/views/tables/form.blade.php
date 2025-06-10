@php
    $isEdit = isset($table);
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $isEdit ? route('tables.update', $table->Table_naumber) : route('tables.store') }}" method="POST">

    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="Table_naumber" class="form-label">Table Number</label>
        <input type="text" name="Table_naumber" class="form-control" value="{{ old('Table_naumber', $isEdit ? $table->Table_naumber : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" name="status" class="form-control" value="{{ old('status', $isEdit ? $table->status : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="Size" class="form-label">Size</label>
        <input type="text" name="Size" class="form-control" value="{{ old('Size', $isEdit ? $table->Size : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="restaurant_id" class="form-label">Restaurant ID</label>
        <input type="number" name="restaurant_id" class="form-control" value="{{ old('restaurant_id', $isEdit ? $table->restaurant_id : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="admin_id" class="form-label">Admin ID</label>
        <input type="number" name="admin_id" class="form-control" value="{{ old('admin_id', $isEdit ? $table->admin_id : '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">
        {{ $isEdit ? 'Update Table' : 'Save Table' }}
    </button>
    <a href="{{ route('tables.index') }}" class="btn btn-secondary">Cancel</a>
</form>