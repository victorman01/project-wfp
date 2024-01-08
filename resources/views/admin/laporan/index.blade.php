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
                    <th scope="col">Produk</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
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
                                <td>Rp. {{ number_format($nota->total_keseluruhan, 0, '.', ',')  }}</td>
                                <td>{{ $nota->user->nama }}</td>
                                <td>{{ $detailTransaksi->jenisProduk->produk->nama }}</td>
                                <td>{{ $nota->metodePembayaran->nama }}</td>
                                <td>{{ $detailTransaksi->jumlah }}</td>
                                <td>Rp.{{ number_format($detailTransaksi->sub_total, 0, '.', ',') }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach

                @php
                    $metodePembayaranCounts = collect($notas->pluck('metodePembayaran.nama'))->countBy();
                    $mostUsedMetodePembayaran = $metodePembayaranCounts->max();
                    $mostUsedMetodePembayaranName = $metodePembayaranCounts->keys()->first();
                    
                    $kurirCounts = collect($notas->pluck('kurir'))->countBy();
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

                    $mostSoldProdukId = collect($totalQuantities)->sortDesc()->keys()->first();

                    $mostSoldProdukQuantity = $totalQuantities[$mostSoldProdukId] ?? 0;
                    $mostSoldProdukName = \App\Models\Produk::find($mostSoldProdukId)->nama;
                @endphp
            </tbody>
        </table>

        <div>
            <p>Produk Paling Banyak Terjual:<b>{{ $mostSoldProdukName }}</b> terjual sebanyak <b>{{ $mostSoldProdukQuantity }}</b> kali</p>
            <p>Metode Pembayaran Paling Banyak Dipakai:<b> {{ $mostUsedMetodePembayaranName }}</b> dipakai sebanyak <b>{{ $mostUsedMetodePembayaran }}</b> kali</p>
            <p>Kurir Paling Banyak Dipakai: <b>{{ $mostUsedKurirName }}</b> digunakan sebanyak <b>{{ $mostUsedKurir }}</b> kali</p>
        </div>
    </div>
@endsection
