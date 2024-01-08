@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Jenis Pengiriman</h2>
        <form method="post" action="/admin/jenis-pengirimans">
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
                <label for="nama">Jenis Pengiriman Name</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kurir_id">Kurir</label>
                <select name="kurir_id" class="form-control form-control-sm">
                    @foreach ($kurirs as $kurir)
                        <option value="{{ $kurir->id }}">{{ $kurir->nama }}</option>
                    @endforeach
                </select>
                @error('kurir_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Jenis Pengiriman</button>
        </form>
    </div>
@endsection
