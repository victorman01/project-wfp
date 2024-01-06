@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Add New Laporan</h2>
        <form method="post">
            @csrf
            
            <button type="submit" class="btn btn-primary">Add Kurir</button>
        </form>
    </div>
@endsection
