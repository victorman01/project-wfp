@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Nota</h2>
        <form method="post" action="/admin/notas/{{ $nota->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="total_pembayaran">Total Pembayaran</label>
                <input type="number" step="0.01" class="form-control" id="total_pembayaran" name="total_pembayaran" value="{{ $nota->total_pembayaran }}" required>
            </div>
            <div class="form-group">
                <label for="status_pengiriman">Status Pengiriman</label>
                <select name="status_pengiriman" class="form-control">
                    @foreach (['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Diterima'] as $status)
                        <option value="{{ $status }}" {{ $nota->status_pengiriman == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $nota->user->id == $user->id ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="metode_pembayaran_id">Metode Pembayaran</label>
                <select name="metode_pembayaran_id" class="form-control">
                    @foreach ($metodePembayarans as $metodePembayaran)
                        <option value="{{ $metodePembayaran->id }}" {{ $nota->metodePembayaran->id == $metodePembayaran->id ? 'selected' : '' }}>
                            {{ $metodePembayaran->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="alamat_pengiriman_id">Alamat Pengiriman</label>
                <select name="alamat_pengiriman_id" class="form-control">
                    @foreach ($alamatPengirimans as $alamatPengiriman)
                        <option value="{{ $alamatPengiriman->id }}" {{ $nota->alamatPengiriman->id == $alamatPengiriman->id ? 'selected' : '' }}>
                            {{ $alamatPengiriman->nama_penerima }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_pengiriman_id">Jenis Pengiriman</label>
                <select name="jenis_pengiriman_id" class="form-control">
                    @foreach ($jenisPengirimans as $jenisPengiriman)
                        <option value="{{ $jenisPengiriman->id }}" {{ $nota->jenisPengiriman->id == $jenisPengiriman->id ? 'selected' : '' }}>
                            {{ $jenisPengiriman->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Nota</button>
        </form>
    </div>
</div>
@endsection