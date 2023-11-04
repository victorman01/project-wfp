@extends('layouts.admin.main')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    <form method="post" action="{{ route('produk.update', $produk->id) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" required>
        </div>
        <div class="form-group">
            <label for="spesifikasi">Spesifikasi Produk</label>
            <input type="text" class a="form-control" id="spesifikasi" name="spesifikasi" value="{{ $produk->spesifikasi }}" required>
        </div>
        <div class="form-group">
            <label for="informasi">Informasi Produk</label>
            <textarea class="form-control" id="informasi" name="informasi" rows="3" required>{{ $produk->informasi }}</textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga Produk Rp.</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok Produk</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}" required>
        </div>
        <div class="form-group">
            <label for="brand_id">Brand Produk</label>
            <input type="text" class="form-control" id="brand_id" name="brand_id" value="{{ $produk->brand_id }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_id">Jenis Produk</label>
            <input type="text" class="form-control" id="jenis_id" name="jenis_id" value="{{ $produk->jenis_id }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>
@endsection
