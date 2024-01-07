@extends('layouts.user.main')

@section('title')
    <title>Daftar Produk</title>
@endsection

@section('content')
    {{-- LIST PRODUCTS --}}

    <section class="wrapper bg-light">
        <div class="overflow-hidden">
            <div class="container py-6 py-md-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('cariProduk') }}" method="GET">
                            <div class="input-group mb-3 ">

                                <input name="keyword" type="text" class="form-control me-2 " placeholder="Cari Produk...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Cari
                                        &nbsp<i class="uil uil-search"></i></button>
                                </div>
                            </div>

                        </form>


                        <div id="produk_container " class="row">
                            {{-- CARD PRODUK --}}
                            @foreach ($produk as $p)
                                <div class="col-4 my-2">
                                    <div class="card">
                                        <figure class="card-img-top overlay overlay-1 hover-scale"><a
                                                href="{{ route('produk-detail', ['produkId' => $p->id]) }}">
                                                <img src="{{ isset($p->gambar[0]) ? asset($p->gambar[0]->path) : '' }}"
                                                    alt="" /></a>
                                            <figcaption>
                                                <h5 class="from-top mb-0">Show More</h5>
                                            </figcaption>
                                        </figure>
                                        <div class="card-body">
                                            <div class="post-header ">
                                                <!-- /.post-category -->
                                                <a href="{{ route('daftarProdukByKategori', ['kategoriId' => $p->kategori_produk[0]->id]) }}" class="hover"
                                                    rel="category">{{ isset($p->kategori_produk[0]) ? $p->kategori_produk[0]->nama : '' }}</a>
                                                <h2 class="post-title h3 mt-1 mb-3">{{ $p->nama }}
                                                </h2>
                                            </div>
                                            <!-- /.post-header -->
                                            <div class="post-content">
                                                <p>{{ $p->spesifikasi }}</p>
                                                <p><b>Rp{{ $p->jenis_produk()->first()->harga }}</b></p>
                                            </div>
                                            <!-- /.post-content -->

                                            <div class="post-footer">
                                                <div class="d-flex justify-content-end">
                                                    <a class="btn btn-primary "
                                                        href="{{ route('produk-detail', ['produkId' => $p->id]) }}">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /div -->
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->
@endsection
