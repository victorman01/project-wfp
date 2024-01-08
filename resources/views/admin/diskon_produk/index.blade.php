@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Diskon Produk table</h2>
        <p><a href="/admin/diskon-produks/create">Create New Diskon Produk</a></p>
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
                    <th scope="col">Diskon</th>
                    <th scope="col">Periode Mulai</th>
                    <th scope="col">Periode Berakhir</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diskonProduks as $diskonProduk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $diskonProduk->diskon }}</td>
                        <td>{{ \Carbon\Carbon::parse($diskonProduk->periode_mulai)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($diskonProduk->periode_berakhir)->format('d M Y') }}</td>
                        <td>{{ $diskonProduk->jenisProduk->nama }}</td>
                        <td>{{ $diskonProduk->created_at->format('d M Y') }}</td>
                        <td>{{ $diskonProduk->updated_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-container">
                                <p class="mb-0"><a class="btn btn-primary btn-sm"
                                        href="/admin/diskon-produks/{{ $diskonProduk->id }}/edit">Edit <i
                                            class="fa fa-edit"></i></a></p>
                                <form action="/admin/diskon-produks/{{ $diskonProduk->id }}" method="POST"
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
