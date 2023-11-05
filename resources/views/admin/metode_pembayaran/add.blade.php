@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Metode Pembayaran</h2>
        <form method="post" action="/admin/metode_pembayarans">
            @csrf
            <div class="form-group">
                <label for="nama">Metode Pembayaran Name</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Metode Pembayaran</button>
        </form>
    </div>
@endsection
