@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form method="post" action="/admin/users/{{ $user->id }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="nomor_handphone">Nomor Handphone</label>
                <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone" value="{{ $user->nomor_handphone }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $user->tgl_lahir->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="point">Point</label>
                <input type="number" class="form-control" id="point" name="point" value="{{ $user->point }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="L" {{ $user->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ $user->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $user->provinsi }}" required>
            </div>
            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class "form-control" id="kota" name="kota" value="{{ $user->kota }}" required>
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $user->kecamatan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
</div>
@endsection