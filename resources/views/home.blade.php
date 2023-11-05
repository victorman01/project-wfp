@extends('layouts.home')

@section('title')
    <title>E-Commerce</title>
@endsection

@section('content')
    {{-- PRODUCT BANNER --}}
    <section class="bg-white">
        <div class="container">
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

    {{-- PRODUCT CATEGORY --}}
    <section class="bg-white">
        <div class="container">
            <h3 class="mt-4">Product Category</h3>

            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($kategoris as $k)
                                {{-- CARD 1 --}}
                                <div class="col-md-4 mb-4">
                                    <div class="card product-card shadow">
                                        <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title">Category 1</h4>
                                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            </p>
                                            <a href="#" class="btn btn-primary">Show</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            {{-- CARD 2 --}}
                            {{-- <div class="col-md-4 mb-4">
                                <div class="card border-dark product-card">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- CARD 3 --}}
                            {{-- <div class="col-md-4 mb-4">
                                <div class="card border-dark product-card">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card product-card shadow">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card border-dark product-card">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card border-dark product-card">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card product-card shadow">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card border-dark product-card">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card border-dark product-card">
                                    <img src="https://picsum.photos/200" class="card-img-top" alt="Product 1">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title">Category 1</h4>
                                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                        <a href="#" class="btn btn-primary">Show</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    {{-- LIST PRODUCT --}}
    <section class="bg-light">

        <div class="container py-2">
            <h3 class="mt-4">List Product</h3>

            <div class="row mt-4 justify-content-center">
                @foreach ($produk as $p)
                    {{-- CARD 1 --}}
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            @foreach ($p->gambar as $gambar)
                                @if ($gambar->path)
                                    <img src="{{ asset('storage/' . $gambar->path) }}" height='200px' />
                                @else
                                    <img src="https://picsum.photos/100" height='200px' />
                                @endif

                            @endforeach

                            {{-- IMG TEST --}}
                            <img class="card-img-top" src="https://picsum.photos/100" height='200px' />

                            <div class="card-body">
                                <p class="card-title">{{ $p->nama }}</p>
                                <p class="card-text">{{ $p->spesifikasi }}</p>
                                <p class="card-text"><b>Rp {{ $p->harga }}</b></p>
                                <a href="{{route('produk-detail', ['produkId' => $p->id ])}}" class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

    {{-- PARTNERSHIP --}}
    <section class="bg-white">
        <div class="container">
            <h3 class="mt-4">Partnership</h3>

            <div class="row">
                <div class="col-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">JNE</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">JNT</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">SiCepat</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the
                                card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
