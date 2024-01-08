@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Laporan table</h2>
        <!-- Sorting Filter Form -->
        <form action="{{ route('admin.laporan') }}" method="get">
            <label for="sort_by">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control form-control-sm">
                <option value="total_keseluruhan">Total Keseluruhan</option>
                <option value="total_pembayaran">Total Pembayaran</option>
            </select>
            <label for="sort_order">Order:</label>
            <select name="sort_order" id="sort_order" class="form-control form-control-sm">
                <option value="asc">Paling Sedikit</option>
                <option value="desc">Paling Banyak</option>
            </select>
            <button class="btn btn-primary btn-sm" type="submit">Apply</button>
        </form>
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

                @php
                    $metodePembayaranCounts = collect($notas->pluck('metodePembayaran.nama'))->countBy();
                    $mostUsedMetodePembayaran = $metodePembayaranCounts->max();
                    
                    $kurirCounts = collect($notas->pluck('kurir'))->countBy();
                    $mostUsedKurir = $kurirCounts->max();

                    $produkCounts = collect($detailTransaksis->pluck('produk_id'))->countBy();
                    $mostSoldProduk = $produkCounts->max();
                @endphp

            </tbody>
        </table>

        <!-- Display additional information outside the table -->
        <div>
            <p>Produk Terjual Terbanyak: {{ $mostSoldProduk }} kali</p>
            <p>Metode Pembayaran Terbanyak: {{ $mostUsedMetodePembayaran }} kali</p>
            <p>Kurir Terbanyak: {{ $mostUsedKurir }} kali</p>
        </div>
    </div>
@endsection
