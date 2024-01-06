@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Alamat Pengiriman</h2>
        <form method="post" action="/admin/alamat_pengirimans/{{ $alamat_pengiriman->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $alamat_pengiriman->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label for="nama_penerima">Nama Penerima</label>
                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="{{ $alamat_pengiriman->nama_penerima }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_handphone">Nomor Handphone</label>
                <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone" value="{{ $alamat_pengiriman->nomor_handphone }}" required>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $alamat_pengiriman->provinsi }}" required>
            </div>
            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" value="{{ $alamat_pengiriman->kota }}" required>
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $alamat_pengiriman->kecamatan }}" required>
            </div>
            <div class="form-group">
                <label for="kelurahan_kode_pos">Kelurahan/Kode Pos</label>
                <input type="text" class="form-control" id="kelurahan_kode_pos" name="kelurahan_kode_pos" value="{{ $alamat_pengiriman->kelurahan_kode_pos }}" required>
            </div>
            <div class="form-group">
                <label for="alamat_utama">Alamat Utama</label>
                <select class="form-control" id="alamat_utama" name="alamat_utama">
                    <option value="1" {{ $alamat_pengiriman->alamat_utama == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $alamat_pengiriman->alamat_utama == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Alamat Pengiriman</button>
        </form>
    </div>
@endsection
