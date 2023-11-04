@extends('layouts.admin.main')
@section('content')
<h2>Sub Kategori table</h2>
        <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama Sub Kategori</th>
                    <th scope="col">Kategori Id</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($queryBuilder as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->kategori_id }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td>{{ $d->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection