@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Nota</h2>
        <form method="post" action="/admin/notas">
            @csrf
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
                <label for="total_pembayaran">Total Pembayaran</label>
                <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran" required>
                @error('total_pembayaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_diskon">Total Diskon</label>
                <input type="number" class="form-control" id="total_diskon" name="total_diskon" required>
                @error('total_diskon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_pembayaran_diskon">Total Pembayaran Diskon</label>
                <input type="number" class="form-control" id="total_pembayaran_diskon" name="total_pembayaran_diskon"
                    required>
                @error('total_pembayaran_diskon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_ppn">Total PPN</label>
                <input type="number" class="form-control" id="total_ppn" name="total_ppn" required>
                @error('total_ppn')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_keseluruhan">Total Keseluruhan</label>
                <input type="number" class="form-control" id="total_keseluruhan" name="total_keseluruhan" required>
                @error('total_keseluruhan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
            <div class="form-group">
                <label for="status_pembayaran">Status Pembayaran</label>
                <select class="form-control" id="status_pembayaran" name="status_pembayaran">
                    <option value="Belum Dibayar">Belum Dibayar</option>
                    <option value="Lunas">Lunas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status_pengiriman">Status Pengiriman</label>
                <select name="status_pengiriman" class="form-control">
                    @foreach (['Menunggu Pembayaran', 'Persiapan Barang', 'Siap Diantar', 'Pengiriman', 'Pesanan Diterima', 'Pesanan Selesai'] as $status)
                        <option value="{{ $status }}">
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Nota</button>
        </form>
    </div>
@endsection
