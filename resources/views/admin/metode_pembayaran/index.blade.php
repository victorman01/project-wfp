@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Metode Pembayaran table</h2>
        <p><a href="/admin/metode-pembayarans/create">Create New Metode Pembayaran</a></p>
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
                        <td>{{ $metode_pembayaran->created_at->format('d M Y') }}</td>
                        <td>{{ $metode_pembayaran->updated_at->format('d M Y') }}</td>
                        <td>
                            <p><a class="btn btn-primary"
                                    href="/admin/metode-pembayarans/{{ $metode_pembayaran->id }}/edit">Edit <i
                                        class="fa fa-edit"></i></a></p>
                            <form action="/admin/metode-pembayarans/{{ $metode_pembayaran->id }}" method="POST"
                                class='d-inline'>
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
