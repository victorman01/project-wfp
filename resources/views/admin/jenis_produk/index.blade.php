@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Jenis Produk table</h2>
        <p><a href="/admin/jenis-produks/create">Create New Jenis Produk</a></p>
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
                    <th scope="col">Spesifikasi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Produk Id</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jps as $jp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jp->nama }}</td>
                        <td>{{ $jp->spesifikasi }}</td>
                        <td>Rp. {{ number_format($jp->harga, 0, ',', '.') }}</td>
                        <td>{{ $jp->stok }}</td>
                        <td>{{ $jp->produk->nama }}</td>
                        <td>{{ $jp->created_at->format('d M Y') }}</td>
                        <td>{{ $jp->updated_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-container">
                                <p class="mb-0"><a class="btn btn-primary btn-sm"
                                        href="/admin/jenis-produks/{{ $jp->id }}/edit">Edit <i
                                            class="fa fa-edit"></i></a></p>
                                <form action="/admin/jenis-produks/{{ $jp->id }}" method="POST" class='d-inline'>
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
