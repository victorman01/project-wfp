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
                            <h2 class="post-title h2">Alamat Pengiriman</h2>

                            <hr class="dropdown-divider">

                            <p class="fw-bold">{{ $alamPeng->nama }}</p>
                            <p class="fw-bold">{{ $alamPeng->nama_penerima }} ({{ $alamPeng->nomor_handphone }})</p>
                            <p class="text">{{ $alamPeng->alamat }}, {{ $alamPeng->kecamatan }}, {{ $alamPeng->kota }},
                                {{ $alamPeng->provinsi }}</p>
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
                                        <img src="https://picsum.photos/150/150" alt="Product Image"
                                            class="img-fluid rounded-4">

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
                                {{-- Perlu diperbaiki --}}
                                <p>Keranjang masih kosong</p>
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
                                    action="{{ route('checkoutItem', ['alamPeng' => $alamPeng, 'produkDibeli' => json_encode($produkPilihan)]) }}"
                                    method="post" id="form_checkout">
                                    @csrf
                                    <select class="form-select" aria-label="Pilih Metode Pembayaran"
                                        id="metode_pembayaran" name="metode_pembayaran" required>
                                        <option value="default" selected>Pilih Metode Pembayaran</option>
                                        @foreach ($metPem as $mp)
                                            <option value="{{ $mp->id }}">{{ $mp->nama }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-select mt-2" aria-label="Pilih Kurir" name="kurir" id="kurir"
                                        onchange="appendJenisPengiriman(this.value)" required>
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
