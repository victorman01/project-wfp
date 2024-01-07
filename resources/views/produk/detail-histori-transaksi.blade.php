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
                                <h5 class="card-title">Status: <span class="badge bg-success rounded">Selesai</span>
                                </h5>
                            </div>
                            <div class="card-body p-2 px-8">
                                <div class="row my-5">
                                    <p class="text-muted">No. Invoice: <span class="text-dark fw-bold">1</span></p>
                                    <p class="text-muted">Tanggal Pembelian: <span class="text-dark fw-bold">08 Jan
                                            2024</span></p>

                                    <p class="text-muted">Kurir: <span class="text-dark">JNE-Sameday</span></p>
                                    <p class="text-muted">Alamat: <span class="text-dark">Nama Jalan <br> Kota, Provinsi
                                            <br> Nomor HP</span></p>
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
                                <p class="text-muted">Metode Pembayaran: <span class="text-dark">OVO</span></p>
                                <p class="text-muted">Total Harga (2 Barang): <span class="text-dark">Rp100.000,-</span></p>
                                <p class="text-muted">Total Ongkir: <span class="text-dark">Rp10.000,-</span></p>
                                <br>
                                <h5 class="fw-bold">Total Harga: Rp110.000,-</span></h5>
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
                        <div class="card border my-3">
                            <div class="card-body p-2">
                                <div class="row my-5" id="histori_transaksi">
                                    <div class="col-2 text-end">
                                        <img src="{{ asset('sandbox360\img\photos\cf3.jpg') }}" alt="Product Image"
                                            class=" img rounded shadow" style="width:120px;height:120px;object-fit: cover;">
                                    </div>

                                    <div class="col-4">
                                        <label for="">Produk A</label>

                                        <h3 class="post-title h3">Jenis: A++</h3>
                                        <p class="text-muted">1 Barang x Rp59000,-</p>
                                    </div>
                                    <div class="col-3">
                                        <br>
                                        <p class="text-muted m-0">Total Belanja</p>
                                        <h3 class="post-title h3 m-0 mb-3">Rp120000,-</h3>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end align-items-end">
                                        <a href="" class="btn btn-outline-primary me-4">Beli Lagi</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border my-3">
                            <div class="card-body p-2">
                                <div class="row my-5" id="histori_transaksi">
                                    <div class="col-2 text-end">
                                        <img src="{{ asset('sandbox360\img\photos\cf3.jpg') }}" alt="Product Image"
                                            class=" img rounded shadow" style="width:120px;height:120px;object-fit: cover;">
                                    </div>

                                    <div class="col-4">
                                        <label for="">Produk A</label>

                                        <h3 class="post-title h3">Jenis: A++</h3>
                                        <p class="text-muted">1 Barang x Rp59000,-</p>
                                    </div>
                                    <div class="col-3">
                                        <br>
                                        <p class="text-muted m-0">Total Belanja</p>
                                        <h3 class="post-title h3 m-0 mb-3">Rp120000,-</h3>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end align-items-end">
                                        <a href="" class="btn btn-outline-primary me-4">Beli Lagi</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border my-3">
                            <div class="card-body p-2">
                                <div class="row my-5" id="histori_transaksi">
                                    <div class="col-2 text-end">
                                        <img src="{{ asset('sandbox360\img\photos\cf3.jpg') }}" alt="Product Image"
                                            class=" img rounded shadow" style="width:120px;height:120px;object-fit: cover;">
                                    </div>

                                    <div class="col-4">
                                        <label for="">Produk A</label>

                                        <h3 class="post-title h3">Jenis: A++</h3>
                                        <p class="text-muted">1 Barang x Rp59000,-</p>
                                    </div>
                                    <div class="col-3">
                                        <br>
                                        <p class="text-muted m-0">Total Belanja</p>
                                        <h3 class="post-title h3 m-0 mb-3">Rp120000,-</h3>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end align-items-end">
                                        <a href="" class="btn btn-outline-primary me-4">Beli Lagi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
