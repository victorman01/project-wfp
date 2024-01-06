@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Alamat Pengiriman table</h2>
        <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
        <p><a href="/admin/alamat_pengirimans/create">Create New Alamat Pengiriman</a></p>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger col-lg-8" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col">Nomor Handphone</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Kelurahan/Kode Pos</th>
                    <th scope="col">Alamat Utama</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alamatPengirimans as $alamat)
                    <tr>
                        <td>{{ $alamat->id }}</td>
                        <td>{{ $alamat->alamat }}</td>
                        <td>{{ $alamat->nama_penerima }}</td>
                        <td>{{ $alamat->nomor_handphone }}</td>
                        <td>{{ $alamat->provinsi }}</td>
                        <td>{{ $alamat->kota }}</td>
                        <td>{{ $alamat->kecamatan }}</td>
                        <td>{{ $alamat->kelurahan_kode_pos }}</td>
                        <td>{{ $alamat->alamat_utama }}</td>
                        <td>{{ $alamat->user_id }}</td>
                        <td>{{ $alamat->created_at }}</td>
                        <td>{{ $alamat->updated_at }}</td>
                        <td>
                            <p><a class="btn btn-primary btn-block"
                                    href="/admin/alamat_pengirimans/{{ $alamat->id }}/edit">Edit <i
                                        class="fa fa-edit"></i></a></p>
                            @can('owner')
                                <form action="/admin/alamat_pengirimans/{{ $alamat->id }}" method="POST" class='d-inline'>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-block" type="submit"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
