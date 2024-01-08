@extends('layouts.admin.main')

@section('style')
    <style>
        .filter .form-select {
            width: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2>Laporan table</h2>
        <form action="{{ route('admin.laporan') }}" method="get" class="my-3">
            <div class="row filter align-items-end">
                <div class="col-md-3 mb-2">
                    <label for="sort_by" class="form-label">Sort by:</label>
                    <select name="sort_by" id="sort_by" class="form-select form-select-sm">
                        <option value="total_keseluruhan">Total Keseluruhan</option>
                        <option value="total_pembayaran">Total Pembayaran</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <label for="sort_order" class="form-label">Order:</label>
                    <select name="sort_order" id="sort_order" class="form-select form-select-sm">
                        <option value="asc">Paling Sedikit</option>
                        <option value="desc">Paling Banyak</option>
                    </select>
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-primary btn-sm" type="submit">Apply</button>
                </div>
            </div>
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
                    <th scope="col">Produk</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Kurir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    @foreach ($detailTransaksis as $detailTransaksi)
                        @if ($nota->id == $detailTransaksi->nota_id)
                            <tr>
                                <td>{{ $nota->id }}</td>
                                <td>Rp. {{ number_format($nota->total_pembayaran, 0, '.', ',') }}</td>
                                <td>Rp. {{ number_format($nota->total_diskon, 0, '.', ',') }}</td>
                                <td>Rp. {{ number_format($nota->total_pembayaran_diskon, 0, '.', ',') }}</td>
                                <td>Rp. {{ number_format($nota->total_ppn, 0, '.', ',') }}</td>
                                <td>Rp. {{ number_format($nota->total_keseluruhan, 0, '.', ',') }}</td>
                                <td>{{ $nota->user->nama }}</td>
                                <td>{{ $detailTransaksi->jenisProduk->produk->nama }}</td>
                                <td>{{ $nota->metodePembayaran->nama }}</td>
                                <td>{{ $detailTransaksi->jumlah }}</td>
                                <td>Rp.{{ number_format($detailTransaksi->sub_total, 0, '.', ',') }}</td>
                                <td>{{ $nota->jenisPengiriman->kurir->nama }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach

                @php
                    $metodePembayaranCounts = collect($notas->pluck('metodePembayaran.nama'))->countBy();
                    $mostUsedMetodePembayaran = $metodePembayaranCounts->max();
                    $mostUsedMetodePembayaranName = $metodePembayaranCounts->keys()->first();

                    $kurirCounts = collect($notas->pluck('jenisPengiriman.kurir.nama'))->countBy();
                    $mostUsedKurir = $kurirCounts->max();
                    $mostUsedKurirName = $kurirCounts->keys()->first();

                    $totalQuantities = [];

                    foreach ($detailTransaksis as $detailTransaksi) {
                        $produkId = $detailTransaksi->jenisProduk->produk_id;
                        if (isset($totalQuantities[$produkId])) {
                            $totalQuantities[$produkId] += $detailTransaksi->jumlah;
                        } else {
                            $totalQuantities[$produkId] = $detailTransaksi->jumlah;
                        }
                    }

                    $mostSoldProdukId = collect($totalQuantities)
                        ->sortDesc()
                        ->keys()
                        ->first();

                    $mostSoldProdukQuantity = $totalQuantities[$mostSoldProdukId] ?? 0;
                    $mostSoldProdukName = \App\Models\Produk::find($mostSoldProdukId)->nama;
                @endphp
            </tbody>
        </table>

        <div class="card text-center mt-4">
            <div class="card-body">
                <h1 class="card-title">LAPORAN STATISTIK</h1>
                <p class="card-text">Produk Paling Banyak Terjual: <b>{{ $mostSoldProdukName }}</b> terjual sebanyak
                    <b>{{ $mostSoldProdukQuantity }}</b> kali
                </p>
                <p class="card-text">Metode Pembayaran Paling Banyak Dipakai: <b>{{ $mostUsedMetodePembayaranName }}</b>
                    dipakai sebanyak <b>{{ $mostUsedMetodePembayaran }}</b> kali</p>
                <p class="card-text">Kurir Paling Banyak Dipakai: <b>{{ $mostUsedKurirName }}</b> digunakan sebanyak
                    <b>{{ $mostUsedKurir }}</b> kali
                </p>
            </div>
        </div>
    </div>
@endsection
