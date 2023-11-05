@extends('layouts.admin.main')
@section('content')
    <h2>Kategori table</h2>
    <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <p><a href="/admin/kategoris/create">Create New Kategori</a></p>
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
                <th scope="col">Nama Kategori</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->created_at }}</td>
                    <td>{{ $k->updated_at }}</td>
                    <td>
                        <p><a href="/admin/kategoris/{{ $k->id }}/edit">Edit</a></p>
                        <form action="/admin/kategoris/{{ $k->id }}" method="POST" class='d-inline'>
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
