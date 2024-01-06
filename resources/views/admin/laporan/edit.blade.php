a@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Edit Laporan</h2>
        <form method="post">
            @csrf
            @method('put')
            
            <button type="submit" class="btn btn-primary">Update Kurir</button>
        </form>
    </div>
</div>
@endsection