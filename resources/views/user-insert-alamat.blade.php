@extends('layouts.user.main')

@section('title')
    <title>Buat Alamat Pengiriman</title>
@endsection

@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center h2">Buat Alamat Pengiriman Baru</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('alamatPengiriman.store') }}">
                            @csrf

                            {{-- Nama --}}
                            <div class="row mb-3">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">Nama Alamat: </label>

                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama"
                                        value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                </div>
                            </div>

                            {{-- Alamat --}}
                            <div class="row mb-3">
                                <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat: </label>

                                <div class="col-md-6">
                                    <input id="alamat" type="text" class="form-control" name="alamat"
                                        value="{{ old('alamat') }}" required autocomplete="alamat">
                                </div>
                            </div>

                            {{-- Nama Penerima --}}
                            <div class="row mb-3">
                                <label for="nama_penerima" class="col-md-4 col-form-label text-md-end">Nama Penerima:
                                </label>

                                <div class="col-md-6">
                                    <input id="nama_penerima" type="text" class="form-control" name="nama_penerima"
                                        value="{{ old('nama_penerima') }}" required autocomplete="nama_penerima">
                                </div>
                            </div>

                            {{-- Nomor Handphone --}}
                            <div class="row mb-3">
                                <label for="nomor_handphone" class="col-md-4 col-form-label text-md-end">Nomor Handphone:
                                </label>

                                <div class="col-md-6">
                                    <input id="nomor_handphone" type="text" class="form-control" name="nomor_handphone"
                                        value="{{ old('nomor_handphone') }}" required autocomplete="nomor_handphone">
                                </div>
                            </div>

                            {{-- Provinsi --}}
                            <div class="row mb-3">
                                <label for="provinsi" class="col-md-4 col-form-label text-md-end">Provinsi: </label>

                                <div class="col-md-6">
                                    <select class="form-control" id="provinsi" name='provinsi'>
                                        <option value="">PILIH PROVINSI</option>
                                        @foreach ($provinsis as $pro)
                                            <option value="{{ $pro->nama }}-{{ $pro->id }}">{{ $pro->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Kota --}}
                            <div class="row mb-3">
                                <label for="kota" class="col-md-4 col-form-label text-md-end">Kota: </label>

                                <div class="col-md-6">
                                    <select class="form-control" id="kota" name='kota'>
                                        <option value="">PILIH KOTA/KABUPATEN</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Kecamatan --}}
                            <div class="row mb-3">
                                <label for="kecamatan" class="col-md-4 col-form-label text-md-end">Kecamatan: </label>

                                <div class="col-md-6">
                                    <select class="form-control" id="kecamatan" name='kecamatan'>
                                        <option value="">PILIH KECAMATAN</option>
                                    </select>
                                </div>
                            </div>

                            {{-- kelurahan_kode_pos --}}
                            <div class="row mb-3">
                                <label for="kelurahan" class="col-md-4 col-form-label text-md-end">Kelurahan:
                                </label>

                                <div class="col-md-6">
                                    <select class="form-control" id="kelurahan" name='kelurahan'>
                                        <option value="">PILIH KELURAHAN</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Alamat Utama --}}
                            <div class="row mb-3 align-items-center">
                                <label for="alamat_utama" class="col-md-4 col-form-label text-md-end">Alamat Utama: </label>

                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input type="radio" name="alamat_utama" class="form-check-input" value="1"
                                            checked><label for="">Ya</label>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input type="radio" name="alamat_utama" class="form-check-input"
                                            value="0"><label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('msg'))
                                <div class="alert alert-danger">
                                    {{ session('msg') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#kota, #kecamatan, #kelurahan').prop('disabled', true);

            $('#provinsi').change(function() {
                var provinsiId = $(this).val();
                provinsiId = provinsiId.split('-');
                provinsiId = provinsiId[1]

                $('#kota, #kecamatan, #kelurahan').empty().prop('disabled', true);

                if (provinsiId) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('getKotas') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'provinsi': provinsiId
                        },
                        success: function(data) {
                            if (data.pesan == 'Gagal') {
                                alert("Gagal!");
                            } else {
                                var kotas = JSON.parse(data.kotas);
                                populateDropdown('#kota', kotas);
                            }
                        },
                        error: handleAjaxError
                    });
                }
            });

            $('#kota').change(function() {
                var kotaId = $(this).val();
                kotaId = kotaId.split('-');
                kotaId = kotaId[1]

                $('#kecamatan, #kelurahan').empty().prop('disabled', true);

                if (kotaId) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('getKecamatans') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'kota': kotaId
                        },
                        success: function(data) {
                            if (data.pesan == 'Gagal') {
                                alert("Gagal!");
                            } else {
                                var kecamatans = JSON.parse(data.kecamatans);
                                populateDropdown('#kecamatan', kecamatans);
                            }
                        },
                        error: handleAjaxError
                    });
                }
            });

            $('#kecamatan').change(function() {
                var kecamatanId = $(this).val();
                kecamatanId = kecamatanId.split('-');
                kecamatanId = kecamatanId[1]

                $('#kelurahan').empty().prop('disabled', true);

                if (kecamatanId) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('getKelurahans') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'kecamatan': kecamatanId
                        },
                        success: function(data) {
                            if (data.pesan == 'Gagal') {
                                alert("Gagal!");
                            } else {
                                var kelurahans = JSON.parse(data.kelurahans);
                                populateDropdown('#kelurahan', kelurahans);
                            }
                        },
                        error: handleAjaxError
                    });
                }
            });

            function handleAjaxError(jqXHR, textStatus, errorThrown) {
                if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                    alert(jqXHR.responseJSON.error);
                } else {
                    alert('An error occurred while processing your request.');
                }
            }

            function populateDropdown(elementId, data) {
                var dropdown = $(elementId);
                dropdown.empty().prop('disabled', false);
                dropdown.append('<option value="">PILIH ' + elementId.toUpperCase().substr(1) + '</option>');

                $.each(data, function(index, item) {
                    dropdown.append('<option value="' + item.nama + '-' + item.id + '">' + item.nama +
                        '</option>');
                });
            }
        });
    </script>
@endsection
