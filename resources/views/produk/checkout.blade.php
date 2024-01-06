@extends('layouts.user.main')

@section('title')
    <title>Charts</title>
@endsection

@section('content')
    {{-- Keranjang --}}
    <section class="bg-white py-10">

        <div class="container py-2 my-5">
            <div class="row">
                <div class="col-8">
                    <div class="card card-border-start border-primary">
                        <div class="card-body">
                            <h2 class="post-title h2">Alamat Pengiriman</h2>

                            <hr class="dropdown-divider">

                            <p class="fw-bold">{{ $alamPeng->nama }}</p>
                            <p class="fw-bold">{{ $alamPeng->nama_penerima }} ({{ $alamPeng->nomor_handphone }})</p>
                            <p class="text">{{ $alamPeng->alamat }}, {{ $alamPeng->kecamatan }}, {{ $alamPeng->kota }},
                                {{ $alamPeng->provinsi }}</p>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-border-start border-primary mt-3">
                        <div class="card-body">
                            <h2 class="post-title h2">Detail Barang</h2>

                            <hr class="dropdown-divider">
                            @if ($keranjang != null)
                                @foreach ($keranjang as $k)
                                    {{-- Loops Here --}}
                                    <div class="d-flex justify-content-start my-5" id="container_produk{{ $k->id }}">
                                        <img src="https://picsum.photos/150/150" alt="Product Image"
                                            class="img-fluid rounded-4">

                                        <div class="container py-1">
                                            <div class="row ms-2">
                                                <h3 class="post-title h3">{{ $k->produk->nama }}</h3>
                                                <p class="text-muted">Spesifikasi: {{ $k->spesifikasi }}</p>
                                                <p id="harga_total{{ $k->id }}">Rp{{ $k->harga }},-</p>
                                                <input type="hidden" id="harga_barang{{ $k->id }}"
                                                    value="{{ $k->harga }}">
                                            </div>
                                        </div>


                                        <div class="d-flex flex-column justify-content-between align-items-end">
                                            <a class="btn btn-sm btn-danger"
                                                onclick="hapusProduk('{{ $k->id }}')"><i class="uil uil-trash"></i>
                                            </a>
                                            <input class="form-control" id="jum_barang{{ $k->id }}" type="number"
                                                onchange="setHargaProduk(this.id)" value="{{ $k->pivot->jumlah }}"
                                                min="1">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- Perlu diperbaiki --}}
                                <p>Keranjang masih kosong</p>
                            @endif
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-4">
                    <div class="card card-border-end border-success">
                        <div class="card-body">
                            <h3 class="post-title h3">Total Price: Rp10.000,-
                            </h3>

                            <h3 class="post-title h3">Total Item(s): 1
                            </h3>

                            <hr class="dropdown-divider">

                            <div class="form-select-wrapper mb-4">
                                <select class="form-select" aria-label="Pilih Kurir">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <a class="d-flex btn btn-success">Pesan</a>

                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
@endsection
