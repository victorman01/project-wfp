@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Nota</h2>
        <form method="post" action="/admin/notas/{{ $nota->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="total_pembayaran"><b>Total Pembayaran:</b> {{ $nota->total_pembayaran }}</label>
            </div>
            <div class="form-group">
                <label for="total_diskon"><b>Total Diskon:</b> {{ $nota->total_diskon }}</label>
            </div>
            <div class="form-group">
                <label for="total_pembayaran_diskon"><b>Total Pembayaran Diskon:</b>
                    {{ $nota->total_pembayaran_diskon }}</label>
            </div>
            <div class="form-group">
                <label for="total_ppn"><b>Total PPN:</b> {{ $nota->total_ppn }}</label>
            </div>
            <div class="form-group">
                <label for="total_keseluruhan"><b>Total Keseluruhan: </b>{{ $nota->total_keseluruhan }}</label>
            </div>
            <div class="form-group">
                <label for="user_id"><b>User: </b>{{ $nota->user->id }} - {{ ucwords($nota->user->nama) }}</label>
            </div>
            <div class="form-group">
                <label for="metode_pembayaran_id"><b>Metode Pembayaran: </b>{{ $nota->metodePembayaran->nama }}</label>
            </div>
            <div class="form-group">
                <label for="alamat_pengiriman_id"><b>Alamat Pengiriman: </b>{{ $nota->alamatPengiriman->nama }}</label>
            </div>
            <div class="form-group">
                <label for="jenis_pengiriman_id"><b>Jenis Pengiriman: </b>{{ $nota->jenisPengiriman->nama }}</label>
            </div>
            <div class="form-group">
                <label for="status_pembayaran">Status Pembayaran</label>
                <select class="form-control form-control-sm" id="status_pembayaran" name="status_pembayaran"
                    @if ($nota->status_pembayaran === 'Lunas') disabled @endif>
                    <option value="Belum Dibayar" {{ $nota->status_pembayaran === 'Belum Dibayar' ? 'selected' : '' }}>
                        Belum Dibayar</option>
                    <option value="Lunas" {{ $nota->status_pembayaran === 'Lunas' ? 'selected' : '' }}>Lunas</option>
                </select>
                <input type="hidden" name="status_pembayaran" value="{{ $nota->status_pembayaran }}">
            </div>
            <div class="form-group">
                <label for="status_pengiriman">Status Pengiriman</label>
                <select name="status_pengiriman" class="form-control form-control-sm">
                    @foreach (['Menunggu Pembayaran', 'Persiapan Barang', 'Siap Diantar', 'Pengiriman', 'Pesanan Diterima', 'Pesanan Selesai'] as $status)
                        @if ($nota->status_pembayaran === 'Lunas' && $status == 'Menunggu Pembayaran')
                            <option value="{{ $status }}" disabled>
                                {{ $status }}
                            </option>
                        @else
                            <option value="{{ $status }}"
                                {{ $nota->status_pengiriman == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Nota</button>
        </form>
    </div>
    </div>
@endsection

@if (session()->has('error'))
    <script>
        alert({{ session('error') }});
    </script>
@endif
