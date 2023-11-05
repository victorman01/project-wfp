@extends('layouts.home')

@section('content')
    <div>
        <p>ID: {{ $produk->id }}</p>
        <p>Nama: {{ $produk->nama }}</p>
        <p>Spesifikasi: {{ $produk->spesifikasi }}</p>
        <p>Informasi: {{ $produk->informasi }}</p>
        <p>Harga: {{ $produk->harga }}</p>
        <p>Stok: {{ $produk->stok }}</p>
        <p>Brand: {{ $produk->brand->nama }}</p>
        @foreach ($produk->gambar as $gambar)
            <img src="{{  asset('storage/' . $gambar->path) }}" alt="">
        @endforeach
        <br>

        {{-- Should Change with Ajax (SOON) --}}
        <a href="{{ route('favorit', ['produkId' => $produk->id]) }}">Favorit</a>

        @if(session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
    </div>
@endsection