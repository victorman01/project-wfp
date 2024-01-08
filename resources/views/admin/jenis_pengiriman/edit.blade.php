@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Jenis Pengiriman</h2>
        <form method="post" action="/admin/jenis-pengirimans/{{ $jenis_pengiriman->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama Jenis Pengiriman</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $jenis_pengiriman->nama }}"
                    required>
            </div>
            <div class="form-group">
                <label for="kurir_id">Kurir</label>
                <select name="kurir_id" class="form-control form-control-sm" style="min-height: 45px;padding: 10px 15px;">
                    @foreach ($kurirs as $kurir)
                        <option value="{{ $kurir->id }}"
                            {{ $jenis_pengiriman->kurir->id == $kurir->id ? 'selected' : '' }}>
                            {{ $kurir->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Jenis Pengiriman</button>
        </form>
    </div>
    </div>
@endsection
