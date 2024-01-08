@extends('layouts.admin.main')
@section('content')
    <h2>Brand table</h2>
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
    <p><a href="/admin/brands/create">Add New Brand</a></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Brand</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                @can('owner')
                    <th scope="col">Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->created_at }}</td>
                    <td>{{ $b->updated_at }}</td>
                    @can('owner')
                        <td>
                            <div class="btn-container">
                                <p class="mb-0"><a class="btn btn-primary btn-sm" href="/admin/brands/{{ $b->id }}/edit">Edit <i
                                    class="fa fa-edit"></i></a></p>
                                <form action="/admin/brands/{{ $b->id }}" method="POST" class='d-inline'>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" 
                                    onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                </p>
                            </div>
                        </td>
                    @endcan

                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
