@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Gambar Produk</h2>
        <form method="post" action="/admin/gambars/{{ $gambar_produk->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama Gambar</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $gambar_produk->nama }}"
                    required>
            </div>
            <div class="form-group">
                <label for="path">Image File</label>
                <input class="form-control @error('path') is-invalid @enderror" type="file" id="path"
                    name="path">
                @error('path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="produk_id">Produk ID</label>
                <input type="number" class="form-control" id="produk_id" name="produk_id"
                    value="{{ $gambar_produk->produk_id }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Gambar Produk</button>
        </form>
    </div>
@endsection
