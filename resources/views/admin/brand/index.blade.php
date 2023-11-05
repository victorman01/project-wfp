@extends('layouts.admin.main')
@section('content')
    <h2>Brand table</h2>
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
    <p><a href="/admin/brands/create">Create New Brand</a></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Brand</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->created_at }}</td>
                    <td>{{ $b->updated_at }}</td>
                    <td>
                        <p><a href="/admin/brands/{{ $b->id }}/edit">Edit</a></p>
                        <form action="/admin/brands/{{ $b->id }}" method="POST" class='d-inline'>
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
