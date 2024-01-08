@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Kategori</h2>
        <form method="post" action="/admin/kategoris">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
