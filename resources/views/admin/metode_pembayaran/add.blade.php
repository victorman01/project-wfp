@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Metode Pembayaran</h2>
        <form method="post" action="/admin/metode-pembayarans">
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
                <label for="nama">Metode Pembayaran Name</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Metode Pembayaran</button>
        </form>
    </div>
@endsection
