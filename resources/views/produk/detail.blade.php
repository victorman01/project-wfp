@extends('layouts.user.main')

@section('title')
    <title>Detail Product</title>
@endsection

@section('content')
    <div class="container">
        <div class="row my-15">
            <div class="col-md-4">
                <div class="swiper-container swiper-thumbs-container dots-over" data-margin="10" data-dots="false"
                    data-nav="true" data-thumbs="true">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($produk->gambar as $gambar)
                                <div class="swiper-slide">
                                    <img src="{{ asset($gambar->path) }}" alt="Product Image"
                                        class="img-fluid rounded" /></a>
                                </div>
                            @endforeach
                        </div>
                        <!--/.swiper-wrapper -->
                    </div>
                    <!-- /.swiper -->
                    <div class="swiper swiper-thumbs">
                        <div class="swiper-wrapper">
                            @foreach ($produk->gambar as $gambar)
                                <div class="swiper-slide">
                                    <img src="{{ asset($gambar->path) }}" alt="Product Image"
                                        class="rounded" /></a>
                                </div>
                            @endforeach
                        </div>
                        <!--/.swiper-wrapper -->
                    </div>
                    <!-- /.swiper -->
                </div>
                <!-- /.swiper-container -->

            </div>

            <div class="col-md-8 product-container">
                <h1>{{ $produk->nama }}</h1>
                <div class="card my-2 border-dark">
                    <div class="card-body">
                        <label for="spesifikasi"><b>Spesifikasi:</b></label>
                        <p id="spesifikasi">{{ $produk->jenisProduk[0]->spesifikasi }}</p>

                        <label for="informasi"><b>Informasi:</b></label>
                        <p id="informasi">{{ $produk->informasi }}</p>

                        <label for="brand"><b>Brand:</b></label>
                        <p id="brand"> {{ $produk->brand->nama }}</p>

                        <label for="brand"><b>Jenis Produk:</b></label>

                        <div class="row">
                            @foreach ($produk->jenisProduk as $jp)
                                @if ($jp == $produk->jenisProduk->first())
                                    <button id="{{ $jp->id }}" class="col-2 m-2 btn btn-primary"
                                        onclick="JenisProdukChange(this.id, '{{ $jp->spesifikasi }}', '{{ number_format($jp->harga, 0, ',', '.') }}', '{{ $jp->stok }}', '{{ $jp->id }}')">{{ $jp->nama }}
                                    </button>
                                @else
                                    <button id="{{ $jp->id }}" class="col-2 m-2 btn btn-outline-primary"
                                        onclick="JenisProdukChange(this.id, '{{ $jp->spesifikasi }}', '{{ number_format($jp->harga, 0, ',', '.') }}', '{{ $jp->stok }}', '{{ $jp->id }}')">{{ $jp->nama }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card my-2 border-dark">
                    <div class="card-body">
                        <p><b>Harga: Rp</b><span
                                id="harga">{{ number_format($produk->jenisProduk[0]->harga, 0, ',', '.') }}</span>
                        </p>
                        <p><b>Jumlah Stok:</b> <span class="text-success" id="stok">
                                {{ $produk->jenisProduk[0]->stok }}</span></p>
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
                                <input type="hidden" name="jenisProdukID" id="jenisProdukID"
                                    value="{{ $produk->jenisProduk[0]->id }}">
                            </div>

                        </div>

                        <div class="col text-end">
                            <a class="btn mt-2 {{ isset($produk->favorit[0]) ? 'btn-pink' : 'btn-success' }}"
                                onclick="Fav({{ $produk->id }})" id="btn-fav">Favorit<i class="ms-2 uil uil-heart"></i>
                            </a>

                            <button type="submit" class="btn btn-primary mt-2" id="btn-submit" 
                                {{ $produk->jenisProduk[0]->stok == 0 ? 'disabled' : '' }}>{{ $produk->jenisProduk[0]->stok == 0 ? 'Stok Habis' : 'Tambahkan Ke Keranjang' }}</button>
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
        function JenisProdukChange(eventId, spek, hargaValue, stokValue, jenisProdukId) {
            var spesifikasi = document.getElementById("spesifikasi");
            var harga = document.getElementById("harga");
            var stok = document.getElementById("stok");
            var jenisProduk = document.getElementById("jenisProdukID");

            spesifikasi.innerHTML = spek;
            harga.innerHTML = hargaValue;
            stok.innerHTML = stokValue;
            jenisProduk.value = jenisProdukId;

            // Mengubah semua class btn jenis produk menjadi outlined
            let sibling = document.getElementById(eventId).parentNode.firstChild;
            while (sibling) {
                sibling.className = "col-2 m-2 btn btn-outline-primary"
                sibling = sibling.nextSibling;
            }

            // Mengubah semua class btn jenis produk terpilih menjadi primary
            document.getElementById(eventId).className = "col-2 m-2 btn btn-primary";
            if(stok.val() == 0){
                $('#btn-submit').prop('disabled', true)
            } else {
                $('#btn-submit').prop('disabled', false)
            }
        }

        function Fav(produkID) {
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
