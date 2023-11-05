@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Shipping Address</h2>
        <form method="post" action="/admin/alamat_pengirimans">
            @csrf
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="nama_penerima">Nama Penerima</label>
                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
            </div>
            <div class="form-group">
                <label for="nomor_handphone">Nomor Handphone</label>
                <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone" required>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" required>
            </div>
            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" required>
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class "form-control" id="kecamatan" name="kecamatan" required>
            </div>
            <div class="form-group">
                <label for="kelurahan_kode_pos">Kelurahan Kode Pos</label>
                <input type="text" class="form-control" id="kelurahan_kode_pos" name="kelurahan_kode_pos" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="alamat_utama" name="alamat_utama" value="1">
                <label class="form-check-label" for="alamat_utama">Alamat Utama</label>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Shipping Address</button>
        </form>
    </div>
@endsection
