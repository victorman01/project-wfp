@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Sub Kategori</h2>
        <form method="post" action="{{ route('subkategori.update', $subKategori->id) }}">
            @csrf
            @method('put')
            
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
@endsection
