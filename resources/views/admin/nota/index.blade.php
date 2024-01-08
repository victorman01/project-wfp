@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Nota table</h2>
        <p><a href="/admin/notas/create">Create New Nota</a></p>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Total Diskon</th>
                    <th scope="col">Total Pembayaran Diskon</th>
                    <th scope="col">Total PPN</th>
                    <th scope="col">Total Keseluruhan</th>
                    <th scope="col">User</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Alamat Pengiriman</th>
                    <th scope="col">Jenis Pengiriman</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Status Pengiriman</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    @can('owner')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    <tr>
                        <td>{{ $nota->id }}</td>
                        <td>{{ $nota->total_pembayaran }}</td>
                        <td>{{ $nota->total_diskon }}</td>
                        <td>{{ $nota->total_pembayaran_diskon }}</td>
                        <td>{{ $nota->total_ppn }}</td>
                        <td>{{ $nota->total_keseluruhan }}</td>
                        <td>{{ $nota->user->nama }}</td>
                        <td>{{ $nota->metodePembayaran->nama }}</td>
                        <td>{{ $nota->alamatPengiriman->alamat }}</td>
                        <td>{{ $nota->jenisPengiriman->nama }}</td>
                        <td>{{ $nota->status_pembayaran }}</td>
                        <td>{{ $nota->status_pengiriman }}</td>
                        <td>{{ $nota->created_at }}</td>
                        <td>{{ $nota->updated_at }}</td>
                        <td>
                            <div class="btn-container">
                                <p class="mb-0"><a class="btn btn-primary btn-sm" href="/admin/notas/{{ $nota->id }}/edit">Edit <i
                                    class="fa fa-edit"></i></a></p>
                                <form action="/admin/notas/{{ $nota->id }}" method="POST" class='d-inline'>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" 
                                    onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
