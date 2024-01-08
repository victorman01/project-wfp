@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Transaction Detail</h2>
        <form method="post" action="/admin/detail-transaksi">
            @csrf
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
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sub_total">Sub Total</label>
                <input type="number" class="form-control" id="sub_total" name="sub_total" required>
                @error('sub_total')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="produk_id">Produk ID</label>
                <select name="produk_id" class="form-control">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                    @endforeach
                </select>
                @error('produk_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nota_id">Nota ID</label>
                <select name="nota_id" class="form-control">
                    @foreach ($notas as $nota)
                        <option value="{{ $nota->id }}">Transaction ID: {{ $nota->id }}</option>
                    @endforeach
                </select>
                @error('nota_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Transaction Detail</button>
        </form>
    </div>
@endsection
