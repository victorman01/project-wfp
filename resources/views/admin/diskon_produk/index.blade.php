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
                    <th scope="col">Produk ID</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diskonProduks as $diskonProduk)
                    <tr>
                        <td>{{ $diskonProduk->id }}</td>
                        <td>{{ $diskonProduk->diskon }}</td>
                        <td>{{ $diskonProduk->periode_mulai }}</td>
                        <td>{{ $diskonProduk->periode_berakhir }}</td>
                        <td>{{ $diskonProduk->produk_id }}</td>
                        <td>{{ $diskonProduk->created_at }}</td>
                        <td>{{ $diskonProduk->updated_at }}</td>
                        <td>
                            <p><a class="btn btn-primary" href="/admin/diskon-produks/{{ $diskonProduk->id }}/edit">Edit <i
                                        class="fa fa-edit"></i></a></p>
                            <form action="/admin/diskon-produks/{{ $diskonProduk->id }}" method="POST" class='d-inline'>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
