@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Kurir</h2>
        <form method="post" action="/admin/kurirs/{{ $kurir->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama Kurir</label>
                <input type="text" class="form-control"  id="nama" name="nama" value="{{ $kurir->nama }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Kurir</button>
        </form>
    </div>
</div>
@endsection