@extends('layouts.admin.main')
@section('content')
<div class="container">
    <h2>Produk table</h2>
    <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <a href="#" onclick="showInfo()"><i class="icon-bulb"></a></i>
    <div id='showInfo'></div>
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
                <th scope="col">Jenis Produk</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($queryBuilder as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->spesifikasi }}</td>
                    <td>{{ $d->informasi }}</td>
                    <td>{{ $d->harga }}</td>
                    <td>{{ $d->stok }}</td>
                    <td>{{ $d->brand_id }}</td>
                    <td>{{ $d->jenis_id }}</td>
                    <td>{{ $d->created_at }}</td>
                    <td>{{ $d->updated_at }}</td>
                    <td>
                        <a class="btn btn-default" href="#showphoto_{{ $d->id }}"
                            data-toggle="modal">{{ $d->nama }}</a>
                        <div class="modal fade" id="showphoto_{{ $d->id }}" tabindex="-1" role="basic"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ $d->nama }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('images/' . $d->image) }}" height='200px' />
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

@section('jss')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</script>
@endsection