@extends('layouts.user.main')

@section('title')
    <title>Detail Product</title>
@endsection

@section('content')
    <div class="container">
        <div class="row my-15">
            <div class="col-md-4">
                {{-- @foreach ($produk->gambar as $gambar)
                    <img src="{{ asset('storage/' . $gambar->path) }}" alt="">
                @endforeach --}}
                <img src="https://picsum.photos/400/500" alt="Product Image" class="img-fluid rounded-4">
            </div>
            <div class="col-md-8 product-container">
                <h1>{{ $produk->nama }}</h1>
                <div class="card my-2 border-dark">
                    <div class="card-body">
                        <label for="spesifikasi"><b>Spesifikasi:</b></label>
                        <p id="spesifikasi">{{ $produk->jenis_produk[0]->spesifikasi }}</p>

                        <label for="informasi"><b>Informasi:</b></label>
                        <p id="informasi">{{ $produk->informasi }}</p>

                        <label for="brand"><b>Brand:</b></label>
                        <p id="brand"> {{ $produk->brand->nama }}</p>

                        <label for="brand"><b>Jenis Produk:</b></label>
                        <ul>
                            @foreach ($produk->jenis_produk as $jp)
                                <li><a href="#" onclick="JenisProdukChange('{{ $jp->spesifikasi }}', '{{ $jp->harga }}', '{{ $jp->stok }}')">{{ $jp->nama_jenis }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card my-2 border-dark">
                    <div class="card-body">
                        <p><b>Harga:</b> <span id="harga">{{ number_format($produk->jenis_produk[0]->harga) }}</span></p>
                        <p><b>Jumlah Stok:</b> <span class="text-success" id="stok"> {{ $produk->jenis_produk[0]->stok }}</span></p>
                    </div>
                </div>

                <div class="row">
                    <form action="{{ route('keranjang.store') }}" method="POST">
                        @csrf
                        <div class="col">
                            <div class="d-flex align-items-center mt-2">
                                <label for="quantity" class="me-2">Quantity:</label>
                                <input type="number" id="quantity" class="form-control" value="1" min="1"
                                    name="quantity">
                                <input type="hidden" name="produkID" value="{{ $produk->id }}">
                            </div>

                        </div>

                        <div class="col text-end">
                            {{-- Should Change with Ajax (SOON) --}}
                            <a class="btn btn-pink mt-2"
                                href="{{ route('favorit', ['produkId' => $produk->id]) }}">Favorit<i
                                    class="ms-2 uil uil-heart"></i> </a>

                            <button type="submit" class="btn btn-primary mt-2">Add to Cart</button>
                        </div>
                    </form>
                </div>


                @if (session('pesan'))
                    <div class="mt-4 alert alert-success">
                        {{ session('pesan') }}
                    </div>
                @endif

                @if (session('pesanKeranjang'))
                    <div class="mt-4 alert alert-success">
                        {{ session('pesanKeranjang') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery (for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function JenisProdukChange(spek, hargaValue, stokValue) {
            var spesifikasi = document.getElementById("spesifikasi");
            var harga = document.getElementById("harga");
            var stok = document.getElementById("stok");
            spesifikasi.innerHTML = spek;
            harga.innerHTML = hargaValue;
            stok.innerHTML = stokValue;
        }
    </script>
@endsection
