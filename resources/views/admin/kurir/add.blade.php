@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Kurir</h2>
        <form method="post" action="/admin/kurirs">
            @csrf
            <div class="form-group">
                <label for="nama">Kurir Name</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Kurir</button>
        </form>
    </div>
@endsection
