@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <h2>Add New Brand</h2>
        <form method="post" action="/admin/brands">
            @csrf
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>
@endsection
