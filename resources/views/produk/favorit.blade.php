@extends('layouts.user.main')

@section('title')
    <title>Favorite Product</title>
@endsection

@section('content')
    {{-- LIST PRODUCT --}}
    {{-- LIST PRODUCT --}}
    <section class="bg-white">

        <div class="container py-2">
            <h3 class="mt-4">List Favorite Product(s)</h3>

            <div class="row mt-4 mb-6 justify-content-start">
                {{-- CARD PRODUK --}}
                @foreach ($favProducts as $p)
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
                                <img src="{{ asset('sandbox360//img/photos/cs1.jpg') }}" height='200px' alt="" />

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
    </section>
@endsection
