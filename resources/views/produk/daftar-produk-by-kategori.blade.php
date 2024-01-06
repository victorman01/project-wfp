@extends('layouts.user.main')

@section('title')
    <title>Daftar Produk Kategori {{ $kategori->nama }}</title>
@endsection

@section('content')
    {{-- LIST PRODUCTS --}}

    <section class="wrapper bg-light">
        <div class="overflow-hidden">
            <div class="container py-6 py-md-8">
                <div class="row">

                    <h2 class="display-5 text-center mt-2 mb-10">Daftar Produk Kategori <span class="text-primary">{{ $kategori->nama }}</span></h2>


                    {{-- CARD PRODUK --}}
                    @foreach ($produk as $p)
                        <article class="col-4 my-2">
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
                                        <a href="#" class="hover"
                                            rel="category">{{ isset($p->kategori[0]) ? $p->kategori[0]->nama : '' }}</a>
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
                        </article>
                        <!-- /article -->
                    @endforeach
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->
@endsection
