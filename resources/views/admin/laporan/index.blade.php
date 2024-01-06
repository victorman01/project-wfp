@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <h2>Laporan table</h2>
        <p><a href="#">Create New Laporan</a></p>
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
                
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
@endsection
