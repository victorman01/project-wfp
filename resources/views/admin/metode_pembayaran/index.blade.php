@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Metode Pembayaran table</h2>
        <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
        <p><a href="/admin/metode-pembayarans/create">Create New Metode Pembayaran</a></p>
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
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($metode_pembayarans as $metode_pembayaran)
                    <tr>
                        <td>{{ $metode_pembayaran->id }}</td>
                        <td>{{ $metode_pembayaran->nama }}</td>
                        <td>{{ $metode_pembayaran->created_at }}</td>
                        <td>{{ $metode_pembayaran->updated_at }}</td>
                        <td>
                            <p><a class="btn btn-primary btn-block"
                                    href="/admin/metode-pembayarans/{{ $metode_pembayaran->id }}/edit">Edit <i
                                        class="fa fa-edit"></i></a></p>
                            @can('owner')
                                <form action="/admin/metode-pembayarans/{{ $metode_pembayaran->id }}" method="POST"
                                    class='d-inline'>
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
