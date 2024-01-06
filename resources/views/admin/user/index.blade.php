@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>User table</h2>
        <p><a href="/admin/users/create">Create New User</a></p>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Point</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Province</th>
                    <th scope="col">City</th>
                    <th scope="col">District</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    @can('owner')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nomor_handphone }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->tgl_lahir)->format('d M Y') }}</td>
                        <td>{{ $user->pelanggan->point }}</td>
                        <td>{{ $user->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $user->provinsi }}</td>
                        <td>{{ $user->kota }}</td>
                        <td>{{ $user->kecamatan }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>{{ $user->updated_at->format('d M Y') }}</td>
                        @can('owner')
                            <td>
                                <p><a class="btn btn-primary" href="/admin/users/{{ $user->id }}/edit">Edit <i
                                            class="fa fa-edit"></i></a></p>

                                <form action="/admin/users/{{ $user->id }}" method="POST" class='d-inline'>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
