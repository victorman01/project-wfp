@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Kurir table</h2>
        <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
        <p><a href="/admin/kurirs/create">Create New Kurir</a></p>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger col-lg-12" role="alert">
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
                @foreach ($kurirs as $kurir)
                    <tr>
                        <td>{{ $kurir->id }}</td>
                        <td>{{ $kurir->nama }}</td>
                        <td>{{ $kurir->created_at }}</td>
                        <td>{{ $kurir->updated_at }}</td>
                        <td>
                            <p><a class="btn btn-primary btn-block" href="/admin/kurirs/{{ $kurir->id }}/edit">Edit <i
                                        class="fa fa-edit"></i></a></p>
                            <form action="/admin/kurirs/{{ $kurir->id }}" method="POST" class='d-inline'>
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-block" type="submit"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
