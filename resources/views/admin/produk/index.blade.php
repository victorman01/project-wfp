@extends('layouts.admin.main')
@section('content')
    <style>
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 1px;
        }
    </style>
    <div class="container">
        <h2>Produk table</h2>
        <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
        <p><a href="/admin/produks/create">Create New Produk</a></p>
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
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Spesifikasi Produk</th>
                    <th scope="col">Informasi Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Stok Produk</th>
                    <th scope="col">Brand Produk</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->spesifikasi }}</td>
                        <td>{{ $p->informasi }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->stok }}</td>
                        <td>{{ $p->brand_id }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->updated_at }}</td>
                        <td>
                            <p><a class="btn btn-primary btn-block" href="/admin/produks/{{ $p->id }}/edit">Edit <i
                                        class="fa fa-edit"></i></a></p>
                            @can('owner')
                                <form action="/admin/produks/{{ $p->id }}" method="POST" class='d-inline'>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-block" type="submit"
                                        onclick="return confirm('Are you sure?')">Delete</button><br>
                                </form>
                            @endcan
                            <a class="btn btn-info btn-block" href="#showphoto_{{ $p->id }}"
                                data-toggle="modal">{{ $p->nama }}</a>
                            <div class="modal fade" id="showphoto_{{ $p->id }}" tabindex="-1" role="basic"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ $p->nama }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            @foreach ($p->gambar as $gambar)
                                                @if ($gambar->path)
                                                    <img src="{{ asset('storage/' . $gambar->path) }}" height='200px' />
                                                @else
                                                    <img src="" height='200px' />
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showInfo() {
            $.ajax({
                type: 'POST',
                url: '{{ route('produk.showInfo') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>'
                },
                success: function(data) {
                    $('#showInfo').html(data.msg);
                }
            });
        }
    </script> --}}
@endsection
