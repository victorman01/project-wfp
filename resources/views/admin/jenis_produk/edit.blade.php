@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit New Jenis Produk</h2>
        <form method="post" action="/admin/jenis-produks/{{ $jp->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value='{{ $jp->nama }}' required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value='{{ $jp->harga }}'
                    required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value='{{ $jp->stok }}'
                    required>
            </div>
            <div class="form-group">
                <label for="produk_id">Produk</label>
                <select name="produk_id" class="form-control" required>
                    @foreach ($produks as $p)
                        <option value="{{ $p->id }}" {{ $jp->produk->id == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="spesifikasi">Spesifikasi</label>
                <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="3" required>{{ $jp->spesifikasi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit Jenis Produk</button>
        </form>
    </div>
@endsection
