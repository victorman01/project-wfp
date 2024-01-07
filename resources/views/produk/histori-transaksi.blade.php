@extends('layouts.user.main')

@section('title')
    <title>Histori Transaksi</title>
@endsection

@section('content')
    {{-- CARD DAFTAR TRANSAKSI --}}
    <div class="card my-10 mb-20">
        <div class="card-header ">
            <h2 class="text-center text-primary">Histori Transaksi</h2>
        </div>
        <div class="card-body">
            {{-- <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Produk</th>
                            <th>Total Harga</th>
                            <th>Detail Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-start">
                                <ul>
                                    <li>Produk 1</li>
                                    <li>Produk 2</li>
                                </ul>
                            </td>
                            <td>Rp100.000,-</td>
                            <td>
                              <a href="" class="btn btn-primary">Lihat Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}

            {{-- CARD TRANSAKSI --}}
            <div class="card my-3">
                <div class="card-header">
                    <h5 class="card-title">Belanja, 05 Jan 2024 <span class="badge bg-success rounded">Terkirim</span></h5>
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

            <div class="card my-3">
                <div class="card-header">
                    <h5 class="card-title">Belanja, 05 Jan 2024 <span class="badge bg-success rounded">Terkirim</span></h5>
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
    @endsection
