@extends('layouts.user.main-test')

@section('content')
    {{-- PRODUCT BANNER --}}
    <section class="wrapper bg-light pt-4 pb-10">
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

    {{-- LIST CATEGORIES --}}
    <section class="wrapper bg-light">
        <div class="container pt-6 pt-md-8 pb-6 pb-md-8">
            <div class="row">
                <h3 class="display-4 mb-6 text-center">Here are our top category</h3>
                {{-- <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
                     --}}
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="position-relative">
                <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1" style="top: 0; left: -1.7rem;">
                </div>
                <div class="swiper-container dots-closer blog grid-view mb-6" data-margin="0" data-dots="true"
                    data-items-xl="3" data-items-md="2" data-items-xs="1">
                    <div class="swiper">
                        <div class="swiper-wrapper">

                            {{-- CATEGORY 1 --}}
                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <article>
                                        <div class="card">
                                            <figure class="card-img-top overlay overlay-1 hover-scale"><a href="#">
                                                    <img src="{{ asset('sandbox360/img/photos/b4.jpg') }}"
                                                        alt="" /></a>
                                                <figcaption>
                                                    <h5 class="from-top mb-0">Show More</h5>
                                                </figcaption>
                                            </figure>
                                            <div class="card-body">
                                                <div class="post-header d-flex align-items-center justify-content-between">
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h3 mt-1 mb-3">Category 1
                                                    </h2>

                                                    <div class="post-category text-line">
                                                        <a href="#" class="hover" rel="category">300 Product(s)</a>
                                                    </div>
                                                </div>
                                                <!-- /.post-header -->
                                                <div class="post-content">
                                                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis
                                                        tempus vestibulum cras imperdiet nun eu dolor.</p>
                                                </div>
                                                <!-- /.post-content -->
                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </article>
                                    <!-- /article -->
                                </div>
                                <!-- /.item-inner -->
                            </div>
                            <!--/.swiper-slide -->

                            {{-- CATEGORY 2 --}}
                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <article>
                                        <div class="card">
                                            <figure class="card-img-top overlay overlay-1 hover-scale"><a href="#">
                                                    <img src="{{ asset('sandbox360/img/photos/b4.jpg') }}"
                                                        alt="" /></a>
                                                <figcaption>
                                                    <h5 class="from-top mb-0">Show More</h5>
                                                </figcaption>
                                            </figure>
                                            <div class="card-body">
                                                <div class="post-header d-flex align-items-center justify-content-between">
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h3 mt-1 mb-3">Category 2
                                                    </h2>

                                                    <div class="post-category text-line">
                                                        <a href="#" class="hover" rel="category">300 Product(s)</a>
                                                    </div>
                                                </div>
                                                <!-- /.post-header -->
                                                <div class="post-content">
                                                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis
                                                        tempus vestibulum cras imperdiet nun eu dolor.</p>
                                                </div>
                                                <!-- /.post-content -->
                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </article>
                                    <!-- /article -->
                                </div>
                                <!-- /.item-inner -->
                            </div>
                            <!--/.swiper-slide -->

                            {{-- CATEGORY 3 --}}
                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <article>
                                        <div class="card">
                                            <figure class="card-img-top overlay overlay-1 hover-scale"><a href="#">
                                                    <img src="{{ asset('sandbox360/img/photos/b4.jpg') }}"
                                                        alt="" /></a>
                                                <figcaption>
                                                    <h5 class="from-top mb-0">Show More</h5>
                                                </figcaption>
                                            </figure>
                                            <div class="card-body">
                                                <div class="post-header d-flex align-items-center justify-content-between">
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h3 mt-1 mb-3">Category 3
                                                    </h2>

                                                    <div class="post-category text-line">
                                                        <a href="#" class="hover" rel="category">300 Product(s)</a>
                                                    </div>
                                                </div>
                                                <!-- /.post-header -->
                                                <div class="post-content">
                                                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis
                                                        tempus vestibulum cras imperdiet nun eu dolor.</p>
                                                </div>
                                                <!-- /.post-content -->
                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </article>
                                    <!-- /article -->
                                </div>
                                <!-- /.item-inner -->
                            </div>
                            <!--/.swiper-slide -->

                            {{-- CATEGORY 4 --}}
                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <article>
                                        <div class="card">
                                            <figure class="card-img-top overlay overlay-1 hover-scale"><a href="#">
                                                    <img src="{{ asset('sandbox360/img/photos/b4.jpg') }}"
                                                        alt="" /></a>
                                                <figcaption>
                                                    <h5 class="from-top mb-0">Show More</h5>
                                                </figcaption>
                                            </figure>
                                            <div class="card-body">
                                                <div class="post-header d-flex align-items-center justify-content-between">
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h3 mt-1 mb-3">Category 4
                                                    </h2>

                                                    <div class="post-category text-line">
                                                        <a href="#" class="hover" rel="category">300
                                                            Product(s)</a>
                                                    </div>
                                                </div>
                                                <!-- /.post-header -->
                                                <div class="post-content">
                                                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis
                                                        tempus vestibulum cras imperdiet nun eu dolor.</p>
                                                </div>
                                                <!-- /.post-content -->
                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </article>
                                    <!-- /article -->
                                </div>
                                <!-- /.item-inner -->
                            </div>
                            <!--/.swiper-slide -->

                            {{-- CATEGORY 4 --}}
                            <div class="swiper-slide">
                                <div class="item-inner">
                                    <article>
                                        <div class="card">
                                            <figure class="card-img-top overlay overlay-1 hover-scale"><a href="#">
                                                    <img src="{{ asset('sandbox360/img/photos/b4.jpg') }}"
                                                        alt="" /></a>
                                                <figcaption>
                                                    <h5 class="from-top mb-0">Show More</h5>
                                                </figcaption>
                                            </figure>
                                            <div class="card-body">
                                                <div class="post-header d-flex align-items-center justify-content-between">
                                                    <!-- /.post-category -->
                                                    <h2 class="post-title h3 mt-1 mb-3">Category 4
                                                    </h2>

                                                    <div class="post-category text-line">
                                                        <a href="#" class="hover" rel="category">300
                                                            Product(s)</a>
                                                    </div>
                                                </div>
                                                <!-- /.post-header -->
                                                <div class="post-content">
                                                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis
                                                        tempus vestibulum cras imperdiet nun eu dolor.</p>
                                                </div>
                                                <!-- /.post-content -->
                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </article>
                                    <!-- /article -->
                                </div>
                                <!-- /.item-inner -->
                            </div>
                            <!--/.swiper-slide -->
                        </div>
                        <!--/.swiper-wrapper -->
                    </div>
                    <!-- /.swiper -->
                </div>
                <!-- /.swiper-container -->
            </div>
            <!-- /.position-relative -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    {{-- LIST PRODUCTS --}}
    <section class="wrapper bg-light">
        <div class="overflow-hidden">
            <div class="container py-6 py-md-8">
                <div class="row">
                    <div class="col-xl-7 col-xxl-6 mx-auto">
                        <h2 class="display-5 text-center mt-2 mb-10">List of Our Products</h2>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
                <div class="row">

                    {{-- CARD PRODUK --}}
                    @foreach ($produk as $p)
                        <article class="col-3 my-2">
                            <div class="card shadow-lg">
                                <figure class="card-img-top overlay overlay-1">
                                    {{-- @foreach ($p->gambar as $gambar)
                                        @if ($gambar->path)
                                            <img src="{{ asset('storage/' . $gambar->path) }}" height='200px' />
                                        @else
                                            <img src="{{ asset('sandbox360//img/photos/cs1.jpg') }}" height='200px' alt="" />
                                        @endif
                                    @endforeach --}}
                                    <img src="{{ asset('sandbox360//img/photos/cs1.jpg') }}" height='200px'
                                        alt="" />

                                </figure>
                                <div class="card-body p-6">
                                    <div class="post-header">
                                        <!-- /.post-category -->

                                        <h4 class="post-title h4 mt-1 mb-3">{{ $p->nama }}</h4>
                                        <p>{{ $p->spesifikasi }}</p>
                                        <p><b>Rp{{ $p->harga }}</b></p>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-footer">
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-primary "
                                                href="{{ route('produk-detail', ['produkId' => $p->id]) }}">Show</a>
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

    {{-- SUPPORTED BY --}}
    <section class="wrapper bg-light wrapper-border">
        <div class="container py-14 py-md-16">
            <h2 class="fs-15 text-uppercase text-muted text-center mb-8">Trusted by Over 5000 Clients</h2>
            <div class="swiper-container clients mb-0" data-margin="30" data-dots="false" data-autoplay-timeout="3000"
                data-items-xxl="7" data-items-xl="6" data-items-lg="5" data-items-md="4" data-items-xs="2">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c1.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c2.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c3.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c4.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c5.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c6.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c7.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c8.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c9.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c10.png') }}"
                                alt="" /></div>
                        <div class="swiper-slide px-5"><img src="{{ asset('sandbox360/img/brands/c11.png') }}"
                                alt="" /></div>
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
@endsection
