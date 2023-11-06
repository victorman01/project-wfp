@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Admin</h2>
        <form method="post" action="/admin/admins/{{ $admin->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $admin->nama }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                    value="{{ \Carbon\Carbon::parse($admin->tgl_lahir)->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="L" {{ $admin->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $admin->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $admin->alamat }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>
@endsection
