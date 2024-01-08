@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Laporan table</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Total Diskon</th>
                    <th scope="col">Total Pembayaran Diskon</th>
                    <th scope="col">Total PPN</th>
                    <th scope="col">Total Keseluruhan</th>
                    <th scope="col">User</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Id Detail Transaksi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Produk ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    @foreach ($detailTransaksis as $detailTransaksi)
                        @if ($nota->id == $detailTransaksi->nota_id)
                            <tr>
                                <td>{{ $nota->id }}</td>
                                <td>{{ $nota->total_pembayaran }}</td>
                                <td>{{ $nota->total_diskon }}</td>
                                <td>{{ $nota->total_pembayaran_diskon }}</td>
                                <td>{{ $nota->total_ppn }}</td>
                                <td>{{ $nota->total_keseluruhan }}</td>
                                <td>{{ $nota->user->nama }}</td>
                                <td>{{ $nota->metodePembayaran->nama }}</td>
                                <td>{{ $detailTransaksi->id }}</td>
                                <td>{{ $detailTransaksi->jumlah }}</td>
                                <td>{{ $detailTransaksi->sub_total }}</td>
                                <td>{{ $detailTransaksi->produk_id }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
