@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Transaction Detail</h2>
        <form method="post" action="/admin/detail_transaksis">
            @csrf
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <div class="form-group">
                <label for="sub_total">Sub Total</label>
                <input type="number" class="form-control" id="sub_total" name="sub_total" required>
            </div>
            <div class="form-group">
                <label for="produk_id">Produk ID</label>
                <select name="produk_id" class="form-control">
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nota_id">Nota ID</label>
                <select name="nota_id" class="form-control">
                    @foreach ($notas as $nota)
                        <option value="{{ $nota->id }}">Transaction ID: {{ $nota->id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Transaction Detail</button>
        </form>
    </div>
@endsection
