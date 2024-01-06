@extends('layouts.user.main')

@section('content')
    <form method="POST" action="{{ route('alamatPengiriman.update', $alamatPengiriman) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="inputNama">Nama Alamat:</label>
            <input type="text" class="form-control" id="inputNama" aria-describedby="inputNama" 
                name="nama" value="{{ $alamatPengiriman->nama }}">
        </div>
        <div class="form-group">
            <label for="inputAlamat">Alamat:</label>
            <input type="text" class="form-control" id="inputAlamat" aria-describedby="inputAlamat" 
                name="alamat" value="{{ $alamatPengiriman->alamat }}">
        </div>
        <div class="form-group">
            <label for="inputNamaPenerima">Nama Penerima:</label>
            <input type="text" class="form-control" id="inputNamaPenerima" aria-describedby="inputNamaPenerima" name="nama_penerima" value="{{ $alamatPengiriman->nama_penerima }}">
        </div>
        <div class="form-group">
            <label for="inputNomorHandphone">Nomor Handphone:</label>
            <input type="text" class="form-control" id="inputNomorHandphone" aria-describedby="inputNomorHandphone" name="nomor_handphone" value="{{ $alamatPengiriman->nomor_handphone }}">
        </div>
        <div class="form-group">
            <label for="inputProvinsi">Provinsi:</label>
            <input type="text" class="form-control" id="inputProvinsi" aria-describedby="inputProvinsi" name="provinsi" value="{{ $alamatPengiriman->provinsi }}">
        </div>
        <div class="form-group">
            <label for="inputKota">Kota:</label>
            <input type="text" class="form-control" id="inputKota" aria-describedby="inputKota" name="kota" value="{{ $alamatPengiriman->kota }}">
        </div>
        <div class="form-group">
            <label for="inputKecamatan">Kecamatan:</label>
            <input type="text" class="form-control" id="inputKecamatan" aria-describedby="inputKecamatan" name="kecamatan" value="{{ $alamatPengiriman->kecamatan }}">
        </div>
        <div class="form-group">
            <label for="inputKelurahanKodePos">Kelurahan & Kode Pos:</label>
            <input type="text" class="form-control" id="inputKelurahanKodePos" aria-describedby="inputKelurahanKodePos" name="kelurahan_kode_pos" value="{{ $alamatPengiriman->kelurahan_kode_pos }}">
        </div>
        <div class="form-group">
            <label for="inputAlamatUtama">Alamat Utama:</label>
            <input type="radio" name="alamat_utama" class="form-check-input" id="alamat_utama1" {{ ($alamatPengiriman->alamat_utama == 1) ? 'checked' : '' }} value="1"><label for="alamat_utama1">Ya</label>
            <input type="radio" name="alamat_utama" class="form-check-input" id="alamat_utama2" {{ ($alamatPengiriman->alamat_utama == 0) ? 'checked' : '' }} value="0"><label for="alamat_utama1">Tidak</label>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <p>Gagal: </p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
