@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Detail Transaksi table</h2>
        <p><a href="/admin/detail-transaksi/create">Create New Detail Transaksi</a></p>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($detailTransaksis as $detailTransaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detailTransaksi->jumlah }}</td>
                        <td>Rp. {{ number_format($detailTransaksi->sub_total, 0, ',', '.') }}</td>
                        <td>{{ $detailTransaksi->jenisProduk->nama }}</td>
                        <td>{{ $detailTransaksi->nota->id }}</td>
                        <td>{{ $detailTransaksi->created_at->format('d M Y') }}</td>
                        <td>{{ $detailTransaksi->updated_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
