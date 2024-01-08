@extends('layouts.user.main')

@section('title')
    <title>Charts</title>
@endsection

@section('content')
    {{-- Keranjang --}}
    <section class="bg-white py-10">

        <div class="container py-2 my-5">
            <div class="row">
                <div class="col-8">
                    <div class="card card-border-start border-primary">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="post-title h2">Alamat Pengiriman</h2>

                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal-alamat">Ganti Alamat</a>

                                <div class="modal fade" id="modal-alamat" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <h2>Ganti Alamat</h2>

                                                @foreach ($alamatPengirimans as $alamatPengiriman)
                                                    @if ($alamatPengiriman->alamat_utama == 1)
                                                        {{-- CARD --}}
                                                        <div id="card_{{ $alamatPengiriman->id }}"
                                                            class="card bg-success card-border-top border-success my-2">
                                                            <div id="card_body_{{ $alamatPengiriman->id }}"
                                                                class="card-body text-white">
                                                                <h5 id="nama_{{ $alamatPengiriman->id }}"
                                                                    class="card-title text-white">
                                                                    {{ $alamatPengiriman->nama }}
                                                                </h5>
                                                                <p id="alamat_{{ $alamatPengiriman->id }}"
                                                                    class="card-text">
                                                                    Alamat:
                                                                    {{ $alamatPengiriman->alamat }},
                                                                    {{ $alamatPengiriman->kecamatan }},
                                                                    {{ $alamatPengiriman->kota }},
                                                                    {{ $alamatPengiriman->provinsi }}</p>
                                                                <p id="nomor_{{ $alamatPengiriman->id }}" class="card-text">
                                                                    Nomor HP:
                                                                    {{ $alamatPengiriman->nomor_handphone }}</p>
                                                                <p id="nama_penerima_{{ $alamatPengiriman->id }}"
                                                                    class="card-text">Nama Penerima:
                                                                    {{ $alamatPengiriman->nama_penerima }}</p>

                                                                <div id="container_{{ $alamatPengiriman->id }}"
                                                                    class="text-end">
                                                                    {{-- <img src="{{ asset('sandbox360/img/icons/lineal/check.svg') }}"
                                                                        class="svg-inject icon-svg icon-svg-sm text-white"
                                                                        alt="" /> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        {{-- CARD --}}
                                                        <div id="card_{{ $alamatPengiriman->id }}"
                                                            class="card card-border-top border-success my-2">
                                                            <div id="card_body_{{ $alamatPengiriman->id }}"
                                                                class="card-body">
                                                                <h5 id="nama_{{ $alamatPengiriman->id }}"
                                                                    class="card-title">
                                                                    {{ $alamatPengiriman->nama }}
                                                                </h5>
                                                                <p id="alamat_{{ $alamatPengiriman->id }}"
                                                                    class="card-text">Alamat:
                                                                    {{ $alamatPengiriman->alamat }},
                                                                    {{ $alamatPengiriman->kecamatan }},
                                                                    {{ $alamatPengiriman->kota }},
                                                                    {{ $alamatPengiriman->provinsi }}</p>
                                                                <p id="nomor_{{ $alamatPengiriman->id }}"
                                                                    class="card-text">
                                                                    Nomor HP:
                                                                    {{ $alamatPengiriman->nomor_handphone }}</p>
                                                                <p id="nama_penerima_{{ $alamatPengiriman->id }}"
                                                                    class="card-text">Nama Penerima:
                                                                    {{ $alamatPengiriman->nama_penerima }}</p>

                                                                <div id="container_{{ $alamatPengiriman->id }}"
                                                                    class="text-end">
                                                                    <button id="{{ $alamatPengiriman->id }}"
                                                                        data-bs-dismiss="modal"
                                                                        class="btn btn-outline-success"
                                                                        onclick="changeAlamatPengiriman(this.id)">
                                                                        Pilih Alamat
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <!--/.modal-body -->
                                        </div>
                                        <!--/.modal-content -->
                                    </div>
                                    <!--/.modal-dialog -->
                                </div>
                                <!--/.modal -->
                            </div>

                            <hr class="dropdown-divider">

                            {{-- Benerin yach --}}
                            @foreach ($alamatPengirimans as $alamatPengiriman)
                                @if ($alamatPengiriman->alamat_utama == 1)
                                    <input type="hidden" id="display_id" value="{{ $alamatPengiriman->id }}">
                                    <p id="display_alamat_nama" class="fw-bold">{{ $alamatPengiriman->nama }}</p>
                                    <p id="display_alamat_penerima" class="fw-bold">Nama Penerima:
                                        {{ $alamatPengiriman->nama_penerima }}</p>
                                    <p id="display_alamat_nomor">Nomor HP: {{ $alamatPengiriman->nomor_handphone }}</p>
                                    <p id="display_alamat" class="text">Alamat:
                                        {{ $alamatPengiriman->alamat }},
                                        {{ $alamatPengiriman->kecamatan }},
                                        {{ $alamatPengiriman->kota }},
                                        {{ $alamatPengiriman->provinsi }}</p>
                                @endif
                            @endforeach

                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-border-start border-primary mt-3">
                        <div class="card-body">
                            <h2 class="post-title h2">Detail Barang</h2>

                            <hr class="dropdown-divider">
                            @if ($keranjang != null)
                                @foreach ($keranjang as $k)
                                    {{-- Loops Here --}}
                                    <div class="d-flex justify-content-start my-5" id="container_produk{{ $k->id }}">
                                        <img src="{{ isset($k->produk->gambar[0]->path) ? asset('storage/' . $k->produk->gambar[0]->path) : '' }}"
                                            alt="Product Image" class="img rounded shadow"
                                            style="width:200px;height:200px;object-fit: cover;">

                                        <div class="container py-1">
                                            <div class="row ms-2">
                                                <h3 class="post-title h3">{{ $k->produk->nama }}</h3>
                                                <p class="text-muted">Spesifikasi: {{ $k->spesifikasi }}</p>
                                                <p id="harga_total{{ $k->id }}">Rp{{ $k->harga }},-</p>
                                                <input type="hidden" id="harga_barang{{ $k->id }}"
                                                    value="{{ $k->harga }}">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column justify-content-between align-items-end">
                                            <input class="form-control" id="jum_barang{{ $k->id }}" type="number"
                                                value="{{ $k->pivot->jumlah }}" disabled>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center my-2">
                                    <p class="h2 text-primary">Checkout masih kosong</p>
                                    <img class="w-50"
                                        src="{{ asset('sandbox360\img\illustrations\empty_chart.jpg') }}" />
                                </div>
                            @endif
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-4">
                    <div class="card card-border-end border-success">
                        <div class="card-body">
                            <h3 class="post-title h3">Total Harga: {{ number_format($totalHarga, 0, ',', '.') }},-
                            </h3>

                            <h3 class="post-title h3">Total Barang: {{ count($keranjang) }}
                            </h3>

                            <hr class="dropdown-divider">

                            <div class="form-select-wrapper mb-4">
                                <form
                                    action="{{ route('checkoutItem', ['produkDibeli' => json_encode($produkPilihan)]) }}"
                                    method="post" id="form_checkout">
                                    @csrf
                                    <input type="hidden" id="alamat_terpilih" name="id_alamat_terpilih" value="">
                                    <select class="form-select" aria-label="Pilih Metode Pembayaran"
                                        id="metode_pembayaran" name="metode_pembayaran" required>
                                        <option value="default" selected>Pilih Metode Pembayaran</option>
                                        @foreach ($metPem as $mp)
                                            <option value="{{ $mp->id }}">{{ $mp->nama }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-select mt-2" aria-label="Pilih Kurir" name="kurir"
                                        id="kurir" onchange="appendJenisPengiriman(this.value)" required>
                                        <option value="default" selected>Pilih Kurir</option>
                                        @foreach ($kurir as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-select mt-2" aria-label="Pilih Kurir" name="jenis_pengiriman"
                                        id="jenis_pengiriman" required>
                                        <option value="default" selected>Pilih Jenis Pengiriman</option>
                                    </select>
                            </div>

                            <button class="d-flex btn btn-success" type="button" onclick="validateForm()">Pesan</button>
                            </form>

                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#alamat_terpilih').val($('#display_id').val());
        })

        function appendJenisPengiriman(kurirID) {
            let listJenisPeng = <?php echo $jenisPengiriman; ?>;
            $('#jenis_pengiriman').html('');
            for (var element of listJenisPeng) {
                if (element['kurir_id'] == kurirID) {
                    $('#jenis_pengiriman').append('<option value="' + element['id'] + '">' + element['nama'] +
                        " (" + element['lama_pengiriman'] + ")" + '</option>');
                }
            }
        }

        function changeAlamatPengiriman(alamatID) {
            // Change Display Alamat
            $('#display_alamat_nama').html($('#nama_' + alamatID).html());
            $('#display_alamat_penerima').html($('#nama_penerima_' + alamatID).html());
            $('#display_alamat_nomor').html($('#nomor_' + alamatID).html());
            $('#display_alamat').html($('#alamat_' + alamatID).html());

            //Replace previously selected alamat
            $('.bg-success').removeClass('bg-success');
            $('.text-white').removeClass('text-white');
            $('#container_' + $('#display_id').val()).empty();
            $('#container_' + $('#display_id').val()).append(`
            <button id="` + $('#display_id').val() + `" 
                data-bs-dismiss="modal"
                class="btn btn-outline-success"
                onclick="changeAlamatPengiriman(this.id)">
                Pilih Alamat</button>`);

            //Replace selected alamat
            $('#card_' + alamatID).addClass('bg-success');
            $('#card_body_' + alamatID).addClass('text-white');
            $('#nama_' + alamatID).addClass('text-white');
            $('#container_' + alamatID).empty();

            //Replace Display Id
            $('#display_id').val(alamatID)

        }

        function validateForm() {
            // Get selected values
            var metodePembayaran = document.getElementById('metode_pembayaran').value;
            var kurir = document.getElementById('kurir').value;
            var jenisPengiriman = document.getElementById('jenis_pengiriman').value;
            var form = document.getElementById('form_checkout');

            // Prevent submitting kalau nilai select masih default
            if (metodePembayaran == 'default' || kurir == 'default' || jenisPengiriman == 'default') {
                alert('Pilih Metode Pembayaran, Kurir, dan Jenis Pengiriman terlebih dahulu!');
            } else {
                form.submit();
            }
        }
    </script>
@endsection
