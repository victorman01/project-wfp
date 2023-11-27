@extends('layouts.user.main')

@section('content')
    {{-- LIST PRODUCT --}}
       {{-- LIST PRODUCT --}}
       <section class="bg-white">

        <div class="container py-2">
            <h3 class="mt-4">List Favorite Product(s)</h3>

            <div class="row mt-4 justify-content-start">
                @foreach ($keranjang as $k)
                    {{-- CARD 1 --}}
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            {{-- @foreach ($p->gambar as $gambar)
                                @if ($gambar->path)
                                    <img src="{{ asset('storage/' . $gambar->path) }}" height='200px' />
                                @else
                                    <img src="https://picsum.photos/100" height='200px' />
                                @endif
                            @endforeach --}}

                            {{-- IMG TEST --}}
                            <img class="card-img-top" src="https://picsum.photos/100" height='200px' />

                            <div class="card-body">
                                <p class="card-title">{{ $k->nama }}</p>
                                <p class="card-text">{{ $k->spesifikasi }}</p>
                                <p class="card-text"><b>Rp {{ $k->harga }}</b></p>
                                <p class="card-text"><b>Qty: <input type="number" name="jumlah" id="jumlah" value="{{ $k->pivot->jumlah }}"></b></p>
                                <a href="{{route('produk-detail', ['produkId' => $k->id ])}}" class="btn btn-primary">Show</a>
                                
                                <a href="#" class="btn btn-primary">Checkout</a>

                                <form action="{{route('keranjang.destroy', $k->id )}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (session('pesan'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                @endif
            </div>
    </section>
@endsection
