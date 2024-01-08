@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Admin</h2>
        <form method="post" action="/admin/admins/{{ $admin->id }}">
            @csrf
            @method('put')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $admin->nama }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}"
                    required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nomor_handphone">Nomor Handphone</label>
                <input type="tel" class="form-control" id="nomor_handphone" name="nomor_handphone"
                    value="{{ $admin->nomor_handphone }}" required>
                @error('nomor_handphone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                    value="{{ \Carbon\Carbon::parse($admin->tgl_lahir)->format('Y-m-d') }}" required>
                @error('tgl_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control form-control-sm" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="L" @if ($admin->jenis_kelamin === 'L') selected @endif>Laki-laki</option>
                    <option value="P" @if ($admin->jenis_kelamin === 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select class="form-control form-control-sm" id="provinsi" name='provinsi'>
                    <option value="">PILIH PROVINSI</option>
                    @foreach ($provinsis as $pro)
                        <option value="{{ $pro->nama }}-{{ $pro->id }}">{{ $pro->nama }}</option>
                    @endforeach
                </select>
                @error('provinsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kota">Kota/Kabupaten</label>
                <select class="form-control form-control-sm" id="kota" name='kota'>
                    <option value="">PILIH KOTA/KABUPATEN</option>
                </select>
                @error('kota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select class="form-control form-control-sm" id="kecamatan" name='kecamatan'>
                    <option value="">PILIH KECAMATAN</option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kelurahan_kode_pos">Kelurahan/Desa</label>
                <select class="form-control form-control-sm" id="kelurahan" name='kelurahan'>
                    <option value="">PILIH KELURAHAN/DESA</option>
                </select>
                @error('kelurahan_kode_pos')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" class="form-control form-control-sm" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if ($admin->role->id === $role->id) selected @endif>
                            {{ $role->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required> {{ $admin->admin->alamat }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Admin</button>
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
