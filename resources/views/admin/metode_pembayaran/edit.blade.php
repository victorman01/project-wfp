@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Metode Pembayaran</h2>
        <form method="post" action="/admin/metode-pembayarans/{{ $metodePembayaran->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama Metode Pembayaran</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $metodePembayaran->nama }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Update Metode Pembayaran</button>
        </form>
    </div>
    </div>
@endsection
