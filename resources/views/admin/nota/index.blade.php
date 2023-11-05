@extends('layouts.admin.main')

@section('content')
<div class="container">
    <h2>Nota table</h2>
    <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <p><a href="/admin/notas/create">Create New Nota</a></p>
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
                <th scope="col">Total Pembayaran</th>
                <th scope="col">Status Pengiriman</th>
                <th scope="col">User ID</th>
                <th scope="col">Metode Pembayaran ID</th>
                <th scope="col">Alamat Pengiriman ID</th>
                <th scope="col">Jenis Pengiriman ID</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                <tr>
                    <td>{{ $nota->id }}</td>
                    <td>{{ $nota->total_pembayaran }}</td>
                    <td>{{ $nota->status_pengiriman }}</td>
                    <td>{{ $nota->user_id }}</td>
                    <td>{{ $nota->metode_pembayaran_id }}</td>
                    <td>{{ $nota->alamat_pengiriman_id }}</td>
                    <td>{{ $nota->jenis_pengiriman_id }}</td>
                    <td>{{ $nota->created_at }}</td>
                    <td>{{ $nota->updated_at }}</td>
                    <td>
                        <p><a class="btn btn-primary btn-block" href="/admin/notas/{{ $nota->id }}/edit">Edit <i class="fa fa-edit"></i></a></p>
                        <form action="/admin/notas/{{ $nota->id }}" method="POST" class='d-inline'>
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection