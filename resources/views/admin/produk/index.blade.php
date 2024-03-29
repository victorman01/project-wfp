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
        <p><a href="/admin/produks/create">Create New Produk</a></p>
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
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Informasi Produk</th>
                    <th scope="col">Brand Produk</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->informasi }}</td>
                        <td>{{ $p->brand->nama }}</td>
                        <td>{{ $p->created_at->format('d M Y') }}</td>
                        <td>{{ $p->updated_at->format('d M Y') }}</td>
                        <td>
                            <div class="btn-container">
                                <p class="mb-0"><a class="btn btn-primary btn-sm"
                                        href="/admin/produks/{{ $p->id }}/edit">Edit <i class="fa fa-edit"></i></a>
                                </p>
                                <form action="/admin/produks/{{ $p->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                <p class="mb-0"><a class="btn btn-info btn-sm" href="#showphoto_{{ $p->id }}"
                                        data-toggle="modal">{{ $p->nama }}</a>
                                </p>
                            </div>

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
