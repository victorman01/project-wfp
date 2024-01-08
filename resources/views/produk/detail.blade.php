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
                                    <img src="{{ asset('storage/' . $gambar->path) }}" alt="Product Image"
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
                                    <img src="{{ asset('storage/' . $gambar->path) }}" alt="Product Image"
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
                                {{-- @if ($jp == $produk->jenisProduk->first())
                                    <button id="{{ $jp->id }}" class="col-2 m-2 btn btn-primary"
                                        onclick="JenisProdukChange(this.id, '{{ $jp->spesifikasi }}', '{{ number_format($jp->harga, 0, ',', '.') }}', '{{ $jp->stok }}', '{{ $jp->id }}')">{{ $jp->nama }}
                                    </button>
                                @else
                                    <button id="{{ $jp->id }}" class="col-2 m-2 btn btn-outline-primary"
                                        onclick="JenisProdukChange(this.id, '{{ $jp->spesifikasi }}', '{{ number_format($jp->harga, 0, ',', '.') }}', '{{ $jp->stok }}', '{{ $jp->id }}')">{{ $jp->nama }}
                                    </button>
                                @endif --}}

                                @php
                                    $checkDiskon = $jp
                                        ->diskonProduk()
                                        ->where('jenis_produk_id', $jp->id)
                                        ->where('periode_mulai', '<=', now())
                                        ->where('periode_berakhir', '>=', now())
                                        ->first();
                                @endphp

                                <button id="{{ $jp->id }}"
                                    class="col-2 m-2 btn {{ $jp == $produk->jenisProduk->first() ? 'btn-primary' : 'btn-outline-primary' }}"
                                    onclick="JenisProdukChanges(this.id, '{{ json_encode($jp) }}', '{{ isset($checkDiskon) ? $produk->jenisProduk[0]->diskonProduk[0]->diskon : 0 }}')">{{ $jp->nama }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card my-2 border-dark">
                    <div class="card-body">
                        @php
                            $checkDiskon = $produk->jenisProduk[0]
                                ->diskonProduk()
                                ->where('jenis_produk_id', $produk->jenisProduk[0]->id)
                                ->where('periode_mulai', '<=', now())
                                ->where('periode_berakhir', '>=', now())
                                ->first();

                            if (isset($checkDiskon)) {
                                $hargaSetelahDisc = ($produk->jenisProduk[0]->harga * (100 - $produk->jenisProduk[0]->diskonProduk[0]->diskon)) / 100;
                                echo '<p id="tampilan"><b>Harga: Rp</b><span id="harga" style="text-decoration: line-through; color:red;">' . number_format($produk->jenisProduk[0]->harga, 0, ',', '.') . '</span><span id="harga_diskon"> ' . number_format($hargaSetelahDisc, 0, ',', '.') . '</span></p>';
                            } else {
                                echo '<p id="tampilan"><b>Harga: Rp</b><span id="harga">' . number_format($produk->jenisProduk[0]->harga, 0, ',', '.') . '</span></p>';
                            }
                        @endphp
                        <p><b>Jumlah Stok:</b> <span class="text-success" id="stok">
                                {{ $produk->jenisProduk[0]->stok }}</span></p>
                    </div>
                </div>

                <div class="row">
                    <form action="{{ route('keranjang.store') }}" method="POST" id="form_submit">
                        @csrf
                        <div class="col">
                            <div class="d-flex align-items-center mt-2">
                                <label for="quantity" class="me-2">Jumlah:</label>
                                <input type="number" id="quantity" class="form-control" value="1" min="1"
                                    name="quantity" max="{{ $produk->jenisProduk[0]->stok }}"
                                    oninput="checkJumlah(this.id, '{{ $produk->jenisProduk[0]->stok }}')">
                                <input type="hidden" name="jenisProdukID" id="jenisProdukID"
                                    value="{{ $produk->jenisProduk[0]->id }}">
                            </div>

                        </div>

                        <div class="col text-end">
                            <a class="btn mt-2 {{ isset($produk->favorit[0]) ? 'btn-pink' : 'btn-success' }}"
                                onclick="Fav({{ $produk->id }})" id="btn-fav">Favorit<i class="ms-2 uil uil-heart"></i>
                            </a>

                            <button type="submit" class="btn btn-primary mt-2" id="btn-submit" onclick="submitForm(this.event)"
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
        //{ OLD }
        // function JenisProdukChange(eventId, spek, hargaValue, stokValue, jenisProdukId) {
        //     var spesifikasi = document.getElementById("spesifikasi");
        //     var harga = document.getElementById("harga");
        //     var stok = document.getElementById("stok");
        //     var jenisProduk = document.getElementById("jenisProdukID");

        //     spesifikasi.innerHTML = spek;
        //     harga.innerHTML = hargaValue;
        //     stok.innerHTML = stokValue;
        //     jenisProduk.value = jenisProdukId;

        //     // Mengubah semua class btn jenis produk menjadi outlined
        //     let sibling = document.getElementById(eventId).parentNode.firstChild;
        //     while (sibling) {
        //         sibling.className = "col-2 m-2 btn btn-outline-primary"
        //         sibling = sibling.nextSibling;
        //     }

        //     // Mengubah semua class btn jenis produk terpilih menjadi primary
        //     document.getElementById(eventId).className = "col-2 m-2 btn btn-primary";
        //     if (stok.val() == 0) {
        //         $('#btn-submit').prop('disabled', true)
        //     } else {
        //         $('#btn-submit').prop('disabled', false)
        //     }
        // }

        function JenisProdukChanges(eventId, jenisProduk, besarDiskon) {
            var jenisProdukJson = JSON.parse(jenisProduk);

            var spesifikasi = document.getElementById("spesifikasi");
            var stok = document.getElementById("stok");
            var jenisProduk = document.getElementById("jenisProdukID");

            spesifikasi.innerHTML = jenisProdukJson['spesifikasi'];
            stok.innerHTML = jenisProdukJson['stok'];
            jenisProduk.value = jenisProdukJson['id'];

            var hargaAsli = jenisProdukJson['harga'].toLocaleString('id-ID');
            var hargaSetelahDiskon = (jenisProdukJson['harga'] * (100 - besarDiskon) / 100).toLocaleString('id-ID');
            if (besarDiskon != 0) {
                $('#tampilan').html('<b>Harga: Rp</b><span id="harga" style="text-decoration: line-through; color:red;">' +
                    hargaAsli + '</span><span id="harga_diskon"> ' + hargaSetelahDiskon + '</span>');
            } else {
                $('#tampilan').html('<p id="tampilan"><b>Harga: Rp</b><span id="harga">' + hargaAsli + '</span></p>');
            }

            // Mengubah semua class btn jenis produk menjadi outlined
            let sibling = document.getElementById(eventId).parentNode.firstChild;
            while (sibling) {
                sibling.className = "col-2 m-2 btn btn-outline-primary"
                sibling = sibling.nextSibling;
            }

            // Mengubah semua class btn jenis produk terpilih menjadi primary
            document.getElementById(eventId).className = "col-2 m-2 btn btn-primary";
            if (stok.value == 0) {
                $('#btn-submit').prop('disabled', true)
            } else {
                $('#btn-submit').prop('disabled', false)
            }
        }

        function checkJumlah(idInput, stok) {
            var jumlahVal = document.getElementById(idInput);

            if (parseInt(jumlahVal.value) > parseInt(stok)) {
                jumlahVal.value = stok;
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

        function submitForm() {
            var quantity = document.getElementById('quantity').value;
            if (quantity === "" || quantity === null || isNaN(quantity) || parseInt(quantity) <= 0) {
                alert("Jumlah Tidak Boleh Kosong");
                event.preventDefault();
                return
            }
            var form = document.getElementById("form_submit");
            form.submit();
        }
    </script>
@endsection
