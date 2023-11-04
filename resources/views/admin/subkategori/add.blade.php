@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Create Sub Kategori</h2>
        <form method="post" action="{{ route('subkategori.store') }}">
            @csrf
            
            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>
@endsection
