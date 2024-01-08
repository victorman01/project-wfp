@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Diskon Produk</h2>
        <form method="post" action="/admin/diskon-produks/{{ $diskon_produk->id }}">
            @csrf
            @method('put')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="diskon">Diskon</label>
                <input type="number" class="form-control" id="diskon" name="diskon" value="{{ $diskon_produk->diskon }}"
                    required>
                @error('diskon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="periode_mulai">Periode Mulai</label>
                <input type="datetime-local" class="form-control" id="periode_mulai" name="periode_mulai"
                    value="{{ $diskon_produk->periode_mulai }}" required>
                @error('periode_mulai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="periode_berakhir">Periode Akhir</label>
                <input type="datetime-local" class="form-control" id="periode_berakhir" name="periode_berakhir"
                    value="{{ $diskon_produk->periode_berakhir }}" required>
                @error('periode_berakhir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="produk_id">Produk ID</label>
                <select name="produk_id" class="form-control form-control-sm">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" {{ $diskon_produk->produk_id ? 'selected' : '' }}>
                            {{ $produk->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Diskon Produk</button>
        </form>
    </div>
@endsection
