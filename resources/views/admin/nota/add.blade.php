@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Nota</h2>
        <form method="post" action="/admin/notas">
            @csrf
            <div class="form-group">
                <label for="total_pembayaran">Total Pembayaran</label>
                <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran" required>
            </div>
            <div class="form-group">
                <label for="status_pengiriman">Status Pengiriman</label>
                <select class="form-control" id="status_pengiriman" name="status_pengiriman">
                    <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Dikirim">Dikirim</option>
                    <option value="Diterima">Diterima</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="metode_pembayaran_id">Metode Pembayaran</label>
                <select class="form-control" id="metode_pembayaran_id" name="metode_pembayaran_id">
                    @foreach ($metode_pembayarans as $metode_pembayaran)
                        <option value="{{ $metode_pembayaran->id }}">{{ $metode_pembayaran->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="alamat_pengiriman_id">Alamat Pengiriman</label>
                <select class="form-control" id="alamat_pengiriman_id" name="alamat_pengiriman_id">
                    @foreach ($alamat_pengirimans as $alamat_pengiriman)
                        <option value="{{ $alamat_pengiriman->id }}">{{ $alamat_pengiriman->alamat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_pengiriman_id">Jenis Pengiriman</label>
                <select class="form-control" id="jenis_pengiriman_id" name="jenis_pengiriman_id">
                    @foreach ($jenis_pengirimans as $jenis_pengiriman)
                        <option value="{{ $jenis_pengiriman->id }}">{{ $jenis_pengiriman->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Nota</button>
        </form>
    </div>
@endsection
