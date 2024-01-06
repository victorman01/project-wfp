@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Gambar table</h2>
        <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Image</th>
                    <th scope="col">Produk ID</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gambars as $gambar)
                    <tr>
                        <td>{{ $gambar->id }}</td>
                        <td>{{ $gambar->nama }}</td>
                        <td>
                            @if ($gambar->path)
                                <img src="{{ asset('storage/' . $gambar->path) }}" height="200px" />
                            @else
                                <img src="" height="200px" />
                            @endif
                        </td>
                        <td>{{ $gambar->produk_id }}</td>
                        <td>{{ $gambar->created_at }}</td>
                        <td>{{ $gambar->updated_at }}</td>
                        <td>
                            <p><a class="btn btn-primary btn-block" href="/admin/gambars/{{ $gambar->id }}/edit">Edit <i
                                        class="fa fa-edit"></i></a></p>
                            @can('owner')
                                <form action="/admin/gambars/{{ $gambar->id }}" method="POST" class='d-inline'>
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
