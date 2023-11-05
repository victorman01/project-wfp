@extends('layouts.home')

@section('content')
    <style>
        .product-card {
            position: relative;
            overflow: hidden;
        }

        .card-img-overlay {
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            flex-direction: column;
            justify-content: Center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .carousel-inner {
            padding: 1em;
        }

        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: #e1e1e1;
            width: 6vh;
            height: 6vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        @media (min-width: 768px) {
            .carousel-item {
                margin-right: 0;
                flex: 0 0 33.333333%;
                display: block;
            }

            .carousel-inner {
                display: flex;
            }
        }

        .card .img-wrapper {
            max-width: 100%;
            height: 13em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* .card img {
                max-height: 100%;
            } */

        @media (max-width: 767px) {
            .card .img-wrapper {
                height: 17em;
            }
        }
    </style>

    {{-- PRODUCT CATEGORY --}}
    <div class="container">
        <h1 class="mt-4 text-center">Product Category</h1>

        <div class="row mt-4">
            {{-- CARD 1 --}}
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

            {{-- CARD 2 --}}
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

            {{-- CARD 3 --}}
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

    {{-- LIST PRODUCT --}}
    <div class="container">
        <h3 class="mt-4">List Product</h3>

        <div class="row mt-4">
            {{-- CARD 1 --}}
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/100" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <p class="card-text"><b>Rp400.000</b></p>
                        <a href="#" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>

            {{-- CARD 2 --}}
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/100" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <p class="card-text"><b>Rp400.000</b></p>
                        <a href="#" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>

            {{-- CARD 3 --}}
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/100" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <p class="card-text"><b>Rp400.000</b></p>
                        <a href="#" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
            
            {{-- CARD 4--}}
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/100" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <p class="card-text"><b>Rp400.000</b></p>
                        <a href="#" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CAROUSEL TEST --}}
    {{-- <div id="carouselExampleControls" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 4</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 5</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 6</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 7</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 8</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 9</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}
@endsection
