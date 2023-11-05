@extends('layouts.admin.main')

@section('content')
    <h2>Edit Brand</h2>
    <form method="post" action="/admin/brands/{{ $brand->id }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $brand->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
@endsection
