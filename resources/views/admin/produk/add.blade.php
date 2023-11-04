@extends('layouts.admin.main')

@section('content')
<div class="container">
    <h2>Add New Produk</h2>
    <form method="post" action="{{ route('produk.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="spesifikasi">Spesifikasi Produk</label>
            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required>
        </div>
        <div class="form-group">
            <label for="informasi">Informasi Produk</label>
            <textarea class="form-control" id="informasi" name="informasi" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok Produk</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>
        <div class="form-group">
            <label for="brand_id">Brand Produk</label>
            <input type="text" class="form-control" id="brand_id" name="brand_id" required>
        </div>
        <div class="form-group">
            <label for="jenis_id">Jenis Produk</label>
            <input type="text" class="form-control" id="jenis_id" name="jenis_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
@endsection
