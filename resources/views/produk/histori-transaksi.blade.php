@extends('layouts.user.main')

@section('title')
    <title>Histori Transaksi</title>
@endsection

@section('content')
    <div class="container ">
        {{-- CARD DAFTAR TRANSAKSI --}}
        <div class="card my-10 mb-20">
            <div class="card-header ">
                <h2 class="text-center text-primary">Detail Transaksi</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        {{-- CARD INVOICE --}}
                        <div class="card my-1">
                            <div class="card-header">
                                <h5 class="card-title">Status: <span class="badge bg-success rounded">Selesai</span>
                                </h5>
                            </div>
                            <div class="card-body p-2 px-8">
                                <div class="row my-5">
                                    <p class="text-muted">No. Invoice: <span class="text-dark fw-bold">1</span></p>
                                    <p class="text-muted">Tanggal Pembelian: <span class="text-dark fw-bold">08 Jan
                                            2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        {{-- CARD ALAMAT --}}
                        <div class="card my-1">
                            <div class="card-header">
                                <h5 class="card-title">Info Pengiriman:
                                </h5>
                            </div>
                            <div class="card-body p-2 px-8">
                                <div class="row my-5">
                                    <p class="text-muted">Kurir: <span class="text-dark">JNE-Sameday</span></p>
                                    <p class="text-muted">Alamat:</p>
                                    <p>Nama Jalan <br> Kota, Provinsi <br> Nomor HP</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card my-3">
                    <div class="card-header">
                        <h5 class="card-title">Belanja, 05 Jan 2024 <span class="badge bg-success rounded">Terkirim</span>
                        </h5>
                    </div>
                    <div class="card-body p-2 px-8">
                        <div class="row my-5" id="histori_transaksi">
                            <div class="col-2 text-end">
                                <img src="{{ asset('sandbox360\img\photos\cf3.jpg') }}" alt="Product Image"
                                    class=" img rounded shadow" style="width:140px;height:140px;object-fit: cover;">
                            </div>

                            <div class="col-4">
                                <label for="">Produk A</label>

                                <h3 class="post-title h3">Jenis: A++</h3>
                                <p class="text-muted">1 Barang x Rp59000,-</p>
                                <p id="harga_total">+1 produk Lainnya</p>
                            </div>
                            <div class="col-3 offset-3">
                                <br>
                                <p class="text-muted m-0">Total Belanja</p>
                                <h3 class="post-title h3 m-0 mb-3">Rp120000,-</h3>
                            </div>
                            <div class="text-end">
                                <a href="" class="btn btn-primary">Lihat Detail Transaksi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
