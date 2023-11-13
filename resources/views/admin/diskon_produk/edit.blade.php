@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Diskon Produk</h2>
        <form method="post" action="/admin/diskon-produks/{{ $diskon_produk->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="diskon">Diskon</label>
                <input type="number" class="form-control" id="diskon" name="diskon" value="{{ $diskon_produk->diskon }}"
                    required>
            </div>
            <div class="form-group">
                <label for="periode_mulai">Periode Mulai</label>
                <input type="datetime-local" class="form-control" id="periode_mulai" name="periode_mulai"
                    value="{{ $diskon_produk->periode_mulai }}" required>
            </div>
            <div class="form-group">
                <label for="periode_berakhir">Periode Akhir</label>
                <input type="datetime-local" class="form-control" id="periode_berakhir" name="periode_berakhir"
                    value="{{ $diskon_produk->periode_berakhir }}" required>
            </div>
            <div class="form-group">
                <label for="produk_id">Produk ID</label>
                <input type="number" class="form-control" id="produk_id" name="produk_id"
                    value="{{ $diskon_produk->produk_id }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Diskon Produk</button>
        </form>
    </div>
@endsection
