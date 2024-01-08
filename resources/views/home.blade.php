@extends('layouts.user.main')

@section('title')
    <title>E-Commerce</title>
@endsection

@section('content')
    {{-- PRODUCT BANNER --}}
    <section class="wrapper bg-light pt-4 pb-2">
        <div class="container z-n1">
            <div id="carouselExample" class="carousel slide ">
                <div class="carousel-inner border rounded-4">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/img/welcome_banner.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/img/welcome_banner.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/img/welcome_banner.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </section>

    {{-- SUPPORTED BY --}}
    <section class="wrapper bg-light wrapper-border">
        <div class="container py-8 py-md-10">
            <h2 class="fs-15 text-uppercase text-muted text-center mb-8">Brand Unggulan</h2>
            <div class="swiper-container clients mb-0" data-margin="30" data-dots="false" data-autoplay-timeout="3000"
                data-items-xxl="3" data-items-xl="3" data-items-lg="3" data-items-md="3" data-items-xs="2">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        {{-- DIV BRAND --}}
                        @foreach ($brands as $b)
                            <div class="swiper-slide px-5">
                                <h2 class="text-center text-secondary display-2">{{ $b->nama }}</h2>
                            </div>
                        @endforeach
                    </div>
                    <!--/.swiper-wrapper -->
                </div>
                <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.section -->

    {{-- LIST PRODUCTS --}}
    <section class="wrapper bg-light">
        <div class="overflow-hidden">
            <div class="container py-6 py-md-8">
                <div class="row">
                    <div class="col-xl-7 col-xxl-6 mx-auto">
                        <h2 class="display-5 text-center mt-2 mb-10">Produk Rekomendasi</h2>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
                <div class="row">
                    {{-- CARD PRODUK --}}
                    @foreach ($produk as $p)
                        <article class="col-4 my-2">
                            <div class="card">
                                <figure class="card-img-top overlay overlay-1 hover-scale"><a
                                        href="{{ route('produk-detail', ['produkId' => $p->id]) }}">
                                        <img src="{{ isset($p->gambar[0]) ? asset('storage/' . $p->gambar[0]->path) : '' }}"
                                            alt="" /></a>
                                    <figcaption>
                                        <h5 class="from-top mb-0">Show More</h5>
                                    </figcaption>
                                </figure>
                                <div class="card-body">
                                    <div class="post-header ">
                                        <!-- /.post-category -->
                                        <a href="{{ route('daftarProdukByKategori', ['kategoriId' => $p->kategoriProduk[0]->id]) }}"
                                            class="hover"
                                            rel="category">{{ isset($p->kategoriProduk[0]) ? $p->kategoriProduk[0]->nama : '' }}</a>
                                        <h2 class="post-title h3 mt-1 mb-3">{{ $p->nama }}
                                        </h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-content">
                                        <p>{{ $p->spesifikasi }}</p>
                                        @php
                                            $checkDiskon = $p->jenisProduk[0]
                                                ->diskonProduk()
                                                ->where('jenis_produk_id', $p->jenisProduk[0]->id)
                                                ->where('periode_mulai', '<=', now())
                                                ->where('periode_berakhir', '>=', now())
                                                ->first();
                                            if (isset($checkDiskon)) {
                                                $hargaSetelahDisc = ($p->jenisProduk[0]->harga * (100 - $checkDiskon->diskon)) / 100;
                                                echo '<p id="tampilan"><b>Rp<span id="harga" style="text-decoration: line-through; color:red;">' . number_format($p->jenisProduk[0]->harga, 0, ',', '.') . '</b></span><span id="harga_diskon"><b> ' . number_format($hargaSetelahDisc, 0, ',', '.') . '</b></span></p>';
                                            } else {
                                                echo '<p id="tampilan"><b>Rp<span id="harga">' . number_format($p->jenisProduk[0]->harga, 0, ',', '.') . '</b></span></p>';
                                            }
                                        @endphp
                                        {{-- <p><b>{{ 'Rp' . number_format($p->jenisProduk()->first()->harga, 0, ',', '.') }}</b> --}}
                                        </p>
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
                        </article>
                        <!-- /article -->
                    @endforeach
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.overflow-hidden -->
    </section>

    {{-- LIST CATEGORIES --}}
    <section class="wrapper bg-light">
        <div class="container pb-6 pb-md-8">
            <!-- /.row -->
            <div class="row">
                <div class="col-3">
                    <div class="card ">
                        <div class="card-body ">
                            <h2 class="mt-2 mb-2 text-primary">Kategori</h2>
                            <hr class="hr p-0 m-0 mb-2">
                            <div class="overflow-auto" style="max-height: 260px;">
                                <ul>
                                    @foreach ($kategoris as $k)
                                        <li>
                                            <a href="{{ route('daftarProdukByKategori', ['kategoriId' => $k->id]) }}"
                                                class="hover" rel="category">{{ $k->nama }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="mt-2 mb-2">Daftar Produk</h2>
                            <hr class="hr p-0 m-0 mb-2">

                            <div class="row">
                                {{-- CARD PRODUK --}}
                                @foreach ($display_produk as $p)
                                    <article class="col-3 my-2">
                                        <a href="{{ route('produk-detail', ['produkId' => $p->id]) }}">
                                            <div class="card">
                                                <img class="card-img-top"
                                                    src="{{ isset($p->gambar[0]) ? asset('storage/' . $p->gambar[0]->path) : ''}}"
                                                    alt="" />
                                                <div class="card-body p-3">
                                                    <h2 class="h4">{{ $p->nama }}
                                                    </h2>
                                                    <p class="m-0">{{ $p->spesifikasi }}</p>
                                                    <p class="m-0 text-dark">
                                                        @php
                                                            $checkDiskon = $p->jenisProduk[0]
                                                                ->diskonProduk()
                                                                ->where('jenis_produk_id', $p->jenisProduk[0]->id)
                                                                ->where('periode_mulai', '<=', now())
                                                                ->where('periode_berakhir', '>=', now())
                                                                ->first();
                                                            if (isset($checkDiskon)) {
                                                                $hargaSetelahDisc = ($p->jenisProduk[0]->harga * (100 - $checkDiskon->diskon)) / 100;
                                                                echo '<b>Rp<span id="harga" style="text-decoration: line-through; color:red;">' . number_format($p->jenisProduk[0]->harga, 0, ',', '.') . '</b></span><span id="harga_diskon"><b> ' . number_format($hargaSetelahDisc, 0, ',', '.') . '</b></span>';
                                                            } else {
                                                                echo '<b>Rp<span id="harga">' . number_format($p->jenisProduk[0]->harga, 0, ',', '.') . '</b></span>';
                                                            }
                                                        @endphp
                                                        {{-- <b>{{ 'Rp' . number_format($p->jenisProduk()->first()->harga, 0, ',', '.') }}
                                                        </b> --}}
                                                    </p>
                                                </div>
                                                <!--/.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </a>

                                    </article>
                                    <!-- /article -->
                                @endforeach
                            </div>
                            <div class="text-end">
                                <a href="{{ route('daftarProduk') }}" class="hover">Lihat Semua ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.position-relative -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
@endsection
