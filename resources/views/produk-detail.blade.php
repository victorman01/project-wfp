@extends('layouts.home')

@section('content')
    <div>
        <form action="{{ route('beliBarang', ['produkId' => $produk->id]) }}" method="post">
            @csrf
            <label for="produkId">Produk ID:
                <input type="text" name="produkId" id="produkId" value="{{ $produk->id }}" disabled>
            </label>
            <br><br>
            <label for="namaProduk">
                Nama Produk : <input type="text" name="namaProduk" id="namaProduk" value="{{ $produk->nama }}" disabled>
            </label>
            <br><br>
            <label for="spesifikasiProduk">
                Spesifikasi : <input type="text" name="spesifikasiProduk" id="spesifikasiProduk" value="{{ $produk->spesifikasi }}" disabled>
            </label>
            <br><br>
            <label for="informasiProduk">
                Spesifikasi : <input type="text" name="informasiProduk" id="informasiProduk" value="{{ $produk->informasi }}" disabled>
            </label>
            <br><br>
            <label for="hargaProduk">
                Spesifikasi : <input type="text" name="hargaProduk" id="hargaProduk" value="{{ $produk->harga }}" disabled>
            </label>
            <br><br>
            <label for="stokProduk">
                Spesifikasi : <input type="text" name="stokProduk" id="stokProduk" value="{{ $produk->stok }}" disabled>
            </label>
            <br><br>
            <label for="brandProduk">
                Spesifikasi : <input type="text" name="brandProduk" id="brandProduk" value="{{ $produk->brand->nama }}" disabled>
            </label>
            <br><br>
            <label for="jumlahBarangDibeliProduk">
                Jumlah Barang : <input type="number" name="jumlahBarangDibeliProduk" id="jumlahBarangDibeliProduk">
            </label>

            <button type="submit">Beli Barang</button>
        </form>

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