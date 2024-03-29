@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Jenis Pengiriman</h2>
        <form method="post" action="/admin/jenis-pengirimans/{{ $jenis_pengiriman->id }}">
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
                <label for="nama">Nama Jenis Pengiriman</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $jenis_pengiriman->nama }}"
                    required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga"
                    value="{{ $jenis_pengiriman->harga }}" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lama_pengiriman">Lama Pengiriman</label>
                <input type="text" class="form-control" id="lama_pengiriman" name="lama_pengiriman"
                    value="{{ $jenis_pengiriman->lama_pengiriman }}" required>
                @error('lama_pengiriman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
                @error('kurir_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Jenis Pengiriman</button>
        </form>
    </div>
    </div>
@endsection
