@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Brand</h2>
        <form method="post" action="/admin/brands/{{ $brand->id }}">
            @csrf
            @method('put')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $brand->nama }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
@endsection
