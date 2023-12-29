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
                <img src="{{ asset($produk->gambar[0]->path) }}" alt="Product Image" class="img-fluid rounded-4" /></a>
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

                        <div class="row">
                            @foreach ($produk->jenis_produk as $jp)
                                @if ($jp == $produk->jenis_produk->first())
                                    <button id="{{ $jp->id }}" class="col-2 m-2 btn btn-primary"
                                        onclick="JenisProdukChange(this.id, '{{ $jp->spesifikasi }}', '{{ $jp->harga }}', '{{ $jp->stok }}')">{{ $jp->nama_jenis }}
                                    </button>
                                @else
                                    <button id="{{ $jp->id }}" class="col-2 m-2 btn btn-outline-primary"
                                        onclick="JenisProdukChange(this.id, '{{ $jp->spesifikasi }}', '{{ $jp->harga }}', '{{ $jp->stok }}')">{{ $jp->nama_jenis }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card my-2 border-dark">
                    <div class="card-body">
                        <p><b>Harga:</b> <span id="harga">{{ number_format($produk->jenis_produk[0]->harga) }}</span>
                        </p>
                        <p><b>Jumlah Stok:</b> <span class="text-success" id="stok">
                                {{ $produk->jenis_produk[0]->stok }}</span></p>
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
                                <input type="hidden" name="produkID" id="produkID" value="{{ $produk->id }}">
                            </div>

                        </div>

                        <div class="col text-end">
                            <a class="btn mt-2 {{ isset($produk->favorit[0]) ? 'btn-pink' : 'btn-success' }}"
                                onclick="Fav()" id="btn-fav">Favorit<i class="ms-2 uil uil-heart"></i> </a>

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
        function JenisProdukChange(eventId, spek, hargaValue, stokValue) {
            var spesifikasi = document.getElementById("spesifikasi");
            var harga = document.getElementById("harga");
            var stok = document.getElementById("stok");

            spesifikasi.innerHTML = spek;
            harga.innerHTML = hargaValue;
            stok.innerHTML = stokValue;

            // Mengubah semua class btn jenis produk menjadi outlined
            let sibling = document.getElementById(eventId).parentNode.firstChild;
            while (sibling) {
                sibling.className = "col-2 m-2 btn btn-outline-primary"
                sibling = sibling.nextSibling;
            }

            // Mengubah semua class btn jenis produk terpilih menjadi primary
            document.getElementById(eventId).className = "col-2 m-2 btn btn-primary";


        }

        function Fav() {
            var produkID = document.getElementById('produkID').value;
            var btn_fav = document.getElementById('btn-fav');
            $.ajax({
                type: 'POST',
                url: '{{ route('favorit') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'produkId': produkID
                },
                success: function(data) {
                    if (data.pesan == 'Tambah Favorit Berhasil') {
                        btn_fav.classList.remove('btn-success');
                        btn_fav.classList.add('btn-pink');
                    } else {
                        btn_fav.classList.remove('btn-pink');
                        btn_fav.classList.add('btn-success');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error response and display the error message
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                        alert(jqXHR.responseJSON.error);
                    } else {
                        alert('An error occurred while processing your request.');
                    }
                }
            })
        }
    </script>
@endsection
