@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Detail Transaksi</h2>
        <form method="post" action="/admin/detail_transaksi/{{ $detail_transaksi->id }}">
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
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $detail_transaksi->jumlah }}"
                    required>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sub_total">Sub Total</label>
                <input type="number" class="form-control" id="sub_total" name="sub_total"
                    value="{{ $detail_transaksi->sub_total }}" required>
                @error('sub_total')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="produk_id">Produk ID</label>
                <input type="number" class="form-control" id="produk_id" name="produk_id"
                    value="{{ $detail_transaksi->produk_id }}" required>
                @error('produk_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nota_id">Nota ID</label>
                <input type="number" class="form-control" id="nota_id" name="nota_id"
                    value="{{ $detail_transaksi->nota_id }}" required>
                @error('nota_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Detail Transaksi</button>
        </form>
    </div>
@endsection
