@extends('layouts.admin.main')

@section('content')
    <h2>Edit Kategori</h2>

    <form method="post" action="{{ route('kategori.update', $kategori->id) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
