@extends('layouts.user.main')

@section('title')
    <title>Favorite Product</title>
@endsection

@section('content')
    {{-- LIST PRODUCT --}}
    <section class="bg-white">

        <div class="container py-2 my-4">

            @if (count($favProducts) > 0)
                <h3 class="mt-4">Daftar Produk Favorit</h3>

                <div class="row mt-4 mb-6 justify-content-start">
                    {{-- CARD PRODUK --}}
                    @foreach ($favProducts as $p)
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
                                        <p><b>{{ 'Rp' . number_format($p->jenisProduk()->first()->harga, 0, ',', '.') }}</b>
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
            @else
                <div class="text-center my-2">
                    <p class="h2 text-primary">Belum Ada Produk Favorit</p>
                    <img class="w-50" src="{{ asset('sandbox360\img\illustrations\empty.png') }}" />
                </div>
            @endif

    </section>
@endsection
