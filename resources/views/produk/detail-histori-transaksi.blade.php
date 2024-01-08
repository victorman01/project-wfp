@extends('layouts.user.main')

@section('title')
    <title>Detail Histori Transaksi</title>
@endsection

@section('content')
    <div class="container ">
        {{-- CARD DAFTAR TRANSAKSI --}}
        <div class="card my-10 mb-20 bg-pale-primary">
            <div class="card-header bg-white border">
                <h2 class="text-center text-primary">Detail Transaksi</h2>
            </div>
            <div class="card-body ">
                <div class="row ">
                    <div class="col">
                        {{-- CARD INVOICE --}}
                        <div class="card my-1 h-100">
                        <div class="card-header">
                                <h5 class="card-title">Status: <span class="badge bg-success rounded">{{ $nota->status_pengiriman }}</span>
                                </h5>
                            </div>
                            <div class="card-body p-2 px-8">
                                <div class="row my-5">
                                    <form action="{{ route('invoiceTransaksi') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_nota" value="{{ $nota->id }}">
                                        <button class="btn btn-success" type="submit">Lihat Invoice</button>
                                    </form>
                                    <p class="text-muted">Tanggal Pembelian: <span class="text-dark fw-bold">{{ date('d F Y', strtotime($nota->created_at)) }}</span></p>

                                    <p class="text-muted">Kurir: <span class="text-dark">{{ $nota->jenisPengiriman->kurir->nama }} - {{ $nota->jenisPengiriman->nama }}</span></p>
                                    <p class="text-muted">Alamat: <span class="text-dark">{{ $nota->alamatPengiriman->alamat }} <br> {{ $nota->alamatPengiriman->kota }}, {{ $nota->alamatPengiriman->provinsi }}
                                            <br> {{ $nota->alamatPengiriman->nomor_handphone }} </span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        {{-- CARD RINCIAN PEMBAYARAN --}}
                        <div class="card my-1 h-100">
                            <div class="card-header">
                                <h5 class="card-title">Rincian Pembayaran</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Metode Pembayaran: <span class="text-dark">{{ $nota->metodePembayaran->nama }}</span></p>
                                <p class="text-muted">Total Harga ({{ count($nota->detailTransaksi) }} Produk): <span class="text-dark">Rp{{ number_format($nota->total_pembayaran, 0, ',', '.') }}</span></p>
                                <p class="text-muted">Diskon: <span class="text-dark">- Rp{{ number_format($nota->total_diskon, 0, ',', '.') }}</span></p>
                                <p class="text-muted">Total Ongkir: <span class="text-dark">Rp{{ number_format($nota->jenisPengiriman->harga, 0, ',', '.') }}</span></p>
                                <p class="text-muted">PPN: <span class="text-dark">Rp{{ number_format($nota->total_ppn, 0, ',', '.') }}</span></p>
                                <br>
                                <h5 class="fw-bold">Total Harga: Rp{{ number_format($nota->total_keseluruhan, 0, ',', '.') }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 mt-7">
                    <div class="card-header">
                        <h5 class="card-title">Detail Produk</h5>
                    </div>
                    <div class="card-body p-5">
                        {{-- DAFTAR PRODUK --}}
                        @foreach($nota->detailTransaksi as $dt)
                            <div class="card border my-3">
                                <div class="card-body p-2">
                                    <div class="row my-5" id="histori_transaksi">
                                        <div class="col-2 text-end">
                                            <img src="{{ isset($dt->produk->gambar[0]) ? asset('storage/' . $dt->produk->gambar[0]->path) : ''}}" alt="Product Image"
                                                class=" img rounded shadow" style="width:120px;height:120px;object-fit: cover;">
                                        </div>

                                        <div class="col-4">
                                            <h3 class="post-title h3">{{ $dt->produk->nama }}</h3>
                                            
                                            <label for="">Jenis: {{ $dt->nama }}</label>
                                            <p class="text-muted">{{ $dt->pivot->jumlah }} Barang x Rp{{ number_format($dt->pivot->sub_total / $dt->pivot->jumlah, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="col-3">
                                            <br>
                                            <p class="text-muted m-0">Total Belanja</p>
                                            <h3 class="post-title h3 m-0 mb-3">Rp{{ number_format($dt->pivot->sub_total, 0, ',', '.') }}</h3>
                                        </div>
                                        <div class="col-3 d-flex justify-content-end align-items-end">
                                            <a href="{{ route('produk-detail', ['produkId' => $dt->produk->id]) }}" class="btn btn-outline-primary me-4">Beli Lagi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
