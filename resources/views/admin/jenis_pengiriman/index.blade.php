@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Jenis Pengiriman table</h2>
        <p><a href="/admin/jenis-pengirimans/create">Create New Jenis Pengiriman</a></p>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Kurir ID</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisPengirimans as $jenisPengiriman)
                    <tr>
                        <td>{{ $jenisPengiriman->id }}</td>
                        <td>{{ $jenisPengiriman->nama }}</td>
                        <td>{{ $jenisPengiriman->kurir->nama }}</td>
                        <td>{{ $jenisPengiriman->created_at->format('d M Y') }}</td>
                        <td>{{ $jenisPengiriman->updated_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-container">
                                <p class="mb-0"><a class="btn btn-primary btn-sm"
                                        href="/admin/jenis-pengirimans/{{ $jenisPengiriman->id }}/edit">Edit <i
                                            class="fa fa-edit"></i></a></p>
                                <form action="/admin/jenis-pengirimans/{{ $jenisPengiriman->id }}" method="POST"
                                    class='d-inline'>
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
