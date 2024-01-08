@extends('layouts.admin.main')

@section('content')
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
    <div class="container">
        <h2>Admin table</h2>
        <p><a href="/admin/admins/create">Create New Admin</a></p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $admin->nama }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($admin->tgl_lahir)->format('d M Y') }}</td>
                        <td>{{ $admin->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $admin->admin->alamat ?? '' }}</td>
                        <td>{{ $admin->role->nama }}</td>
                        <td>{{ $admin->created_at->format('d M Y') }}</td>
                        <td>{{ $admin->updated_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-container">
                                <p class="mb-0"><a class="btn btn-primary btn-sm"
                                        href="/admin/admins/{{ $admin->id }}/edit">Edit <i class="fa fa-edit"></i></a>
                                </p>
                                <form action="/admin/admins/{{ $admin->id }}" method="POST" class='d-inline'>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
