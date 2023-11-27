@extends('layouts.user.main')

@section('title')
    <title>Charts</title>
@endsection

@section('content')
    {{-- Keranjang --}}
    <section class="bg-white">

        <div class="container py-2 my-5">
            <div class="row">
                <div class="col-8">
                    <div class="card card-border-start border-primary">
                        <div class="card-body">
                            <h2 class="post-title h2">Chart Item(s)
                            </h2>

                            <hr class="dropdown-divider">

                            @foreach ($keranjang as $k)
                                {{-- Loops Here --}}
                                <div class="d-flex justify-content-start">
                                    <img src="https://picsum.photos/150/150" alt="Product Image" class="img-fluid rounded-4">

                                    <div class="row ms-2">
                                        <h3 class="post-title h3">{{ $k->nama }}</h3>
                                        <p class="text-muted">{{ $k->spesifikasi }}</p>
                                        <p><b>Rp {{ $k->harga }}</b></p>
                                    </div>

                                    <div class="d-flex justify-content-evenly align-items-end    ">
                                        <button class="btn btn-outline-primary btn-sm"><i class="uil uil-minus"></i></button>
                                        <h3 class="text mx-2">1</h3>
                                        <button class="btn btn-outline-primary btn-sm"><i class="uil uil-plus"></i></button>
                                    </div>
                                </div>
                            @endforeach
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

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-success btn-sm">Buy</button>

                            </div>

                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
@endsection
