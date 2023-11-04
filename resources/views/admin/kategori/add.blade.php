@extends('layouts.admin.main')

@section('content')
    <h2>Add New Kategori</h2>

    <form method="post" action="{{ route('kategori.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
