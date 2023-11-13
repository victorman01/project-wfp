@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Product Discount</h2>
        <form method="post" action="/admin/diskon-produks">
            @csrf
            <div class="form-group">
                <label for="diskon">Jumlah Diskon(%)</label>
                <input type="number" class="form-control" id="diskon" name="diskon" min=0 max=100 required>
            </div>
            <div class="form-group">
                <label for="periode_mulai">Periode Mulai</label>
                <input type="datetime-local" class="form-control" id="periode_mulai" name="periode_mulai" required>
            </div>
            <div class="form-group">
                <label for="periode_berakhir">Periode Akhir</label>
                <input type="datetime-local" class="form-control" id="periode_berakhir" name="periode_berakhir" required>
            </div>
            <div class="form-group">
                <label for="produk_id">Produk ID</label>
                <select name="produk_id" class="form-control">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Product Discount</button>
        </form>
    </div>
@endsection
