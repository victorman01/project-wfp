@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Alamat Pengiriman</h2>
        <form method="post" action="/admin/alamat-pengirimans/{{ $alamat_pengiriman->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama Tempat</label>
                <input type="text" class="form-control" id="nama" name="nama" value={{ $alamat_pengiriman->nama }}
                    required>
            </div>
            <div class="form-group">
                <label for="nama_penerima">Nama Penerima</label>
                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima"
                    value="{{ $alamat_pengiriman->nama_penerima }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_handphone">Nomor Handphone</label>
                <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone"
                    value="{{ $alamat_pengiriman->nomor_handphone }}" required>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control form-control-sm" id="provinsi" name='provinsi'>
                    <option value="">PILIH PROVINSI</option>
                    @foreach ($provinsis as $pro)
                        <option value="{{ $pro->nama }}-{{ $pro->id }}">{{ $pro->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kota">Kota/Kabupaten</label>
                <select class="form-control form-control-sm" id="kota" name='kota'>
                    <option value="">PILIH KOTA/KABUPATEN</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select class="form-control form-control-sm" id="kecamatan" name='kecamatan'>
                    <option value="">PILIH KECAMATAN</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kelurahan_kode_pos">Kelurahan/Desa</label>
                <select class="form-control form-control-sm" id="kelurahan" name='kelurahan'>
                    <option value="">PILIH KELURAHAN/DESA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat_utama">Alamat Utama</label>
                <select class="form-control" id="alamat_utama" name="alamat_utama">
                    <option value="1" {{ $alamat_pengiriman->alamat_utama == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $alamat_pengiriman->alamat_utama == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id == $alamat_pengiriman->user_id) selected @endif>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $alamat_pengiriman->alamat }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Alamat Pengiriman</button>
        </form>
    </div>
@endsection
@section('scripts')
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
