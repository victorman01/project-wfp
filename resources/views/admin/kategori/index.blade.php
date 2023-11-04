@extends('layouts.admin.main')
@section('content')
<h2>Kategori table</h2>
<p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
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
                @foreach ($queryBuilder as $k)
                    <tr>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->created_at }}</td>
                        <td>{{ $k->updated_at }}</td>
                        <td><a href="#" class="btn btn-default btn-xs">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
        