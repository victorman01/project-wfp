@extends('layouts.user.main')

@section('content')
    {{-- LIST PRODUCT --}}
       {{-- LIST PRODUCT --}}
       <section class="bg-white">

        <div class="container py-2">
            <h3 class="mt-4">List Favorite Product(s)</h3>

            <div class="row mt-4 justify-content-start">
                @foreach ($favProducts as $p)
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
@endsection
