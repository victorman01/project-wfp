@extends('layouts.home')

@section('content')
    {{-- LIST PRODUCT --}}
    <section class="bg-light">

        <div class="container py-2">
            <h3 class="mt-4">Produk Favorit</h3>

            <div class="row mt-4 justify-content-center">
                {{-- CARD 1 --}}
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm">
                        {{-- IMG TEST --}}
                        <img class="card-img-top" src="https://picsum.photos/100" height='200px' />

                        <div class="card-body">
                            <p class="card-title">Produk 1</p>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae quod odio
                                id doloribus consequuntur eveniet eligendi? Eos, tenetur enim ducimus rem maiores, qui illo
                                nam fuga consectetur quia repudiandae voluptatibus?</p>
                            <p class="card-text"><b>Rp 10.000</b></p>
                            <a href="" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>

                {{-- CARD 2 --}}
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm">
                        {{-- IMG TEST --}}
                        <img class="card-img-top" src="https://picsum.photos/100" height='200px' />

                        <div class="card-body">
                            <p class="card-title">Produk 1</p>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae quod odio
                                id doloribus consequuntur eveniet eligendi? Eos, tenetur enim ducimus rem maiores, qui illo
                                nam fuga consectetur quia repudiandae voluptatibus?</p>
                            <p class="card-text"><b>Rp 10.000</b></p>
                            <a href="" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>

                {{-- CARD 3 --}}
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm">
                        {{-- IMG TEST --}}
                        <img class="card-img-top" src="https://picsum.photos/100" height='200px' />

                        <div class="card-body">
                            <p class="card-title">Produk 1</p>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae quod odio
                                id doloribus consequuntur eveniet eligendi? Eos, tenetur enim ducimus rem maiores, qui illo
                                nam fuga consectetur quia repudiandae voluptatibus?</p>
                            <p class="card-text"><b>Rp 10.000</b></p>
                            <a href="" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>

                {{-- CARD 4 --}}
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm">
                        {{-- IMG TEST --}}
                        <img class="card-img-top" src="https://picsum.photos/100" height='200px' />

                        <div class="card-body">
                            <p class="card-title">Produk 1</p>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae quod odio
                                id doloribus consequuntur eveniet eligendi? Eos, tenetur enim ducimus rem maiores, qui illo
                                nam fuga consectetur quia repudiandae voluptatibus?</p>
                            <p class="card-text"><b>Rp 10.000</b></p>
                            <a href="" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
