@extends('layouts.admin.main')

@section('content')
<div class="container">
    <h2>Detail Transaksi table</h2>
    <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <p><a href="/admin/detail_transaksis/create">Create New Detail Transaksi</a></p>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Produk ID</th>
                <th scope="col">Nota ID</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailTransaksis as $detailTransaksi)
                <tr>
                    <td>{{ $detailTransaksi->id }}</td>
                    <td>{{ $detailTransaksi->jumlah }}</td>
                    <td>{{ $detailTransaksi->sub_total }}</td>
                    <td>{{ $detailTransaksi->produk_id }}</td>
                    <td>{{ $detailTransaksi->nota_id }}</td>
                    <td>{{ $detailTransaksi->created_at }}</td>
                    <td>{{ $detailTransaksi->updated_at }}</td>
                    <td>
                        <p><a class="btn btn-primary btn-block" href="/admin/detail_transaksis/{{ $detailTransaksi->id }}/edit">Edit <i class="fa fa-edit"></i></a></p>
                        <form action="/admin/detail_transaksis/{{ $detailTransaksi->id }}" method="POST" class='d-inline'>
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
