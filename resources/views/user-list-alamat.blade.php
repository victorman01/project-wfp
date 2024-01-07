@extends('layouts.user.main')


@section('title')
    <title>Daftar Alamat Pengiriman</title>
@endsection

@section('content')
    <div class="container my-10">

        @if (count($alamat) > 0)
            <div class="card-header text-center h2">Daftar Alamat Pengiriman</div>

            <div class="row">

                @foreach ($alamat as $a)
                    @if ($a->status_hapus == 0)
                        {{-- CARD ALAMAT --}}
                        <div class="col-4">
                            <div
                                class="card {{ $a->alamat_utama == 1 ? 'card-border-top border-success' : 'card-border-top border-primary' }} ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $a->nama }}
                                        {!! $a->alamat_utama == 1
                                            ? '<span class="badge bg-pale-green text-success rounded-pill">Alamat Utama</span>'
                                            : '' !!}
                                    </h5>
                                    <p class="card-text">Alamat: {{ $a->alamat }}, {{ $a->kota }},
                                        {{ $a->provinsi }}</p>
                                    <p class="card-text">Nomor HP: {{ $a->nomor_handphone }}</p>
                                    <p class="card-text">Nama Penerima: {{ $a->nama_penerima }}</p>

                                    <div class="d-flex justify-content-end align-items-center ">
                                        <a href="{{ route('alamatPengiriman.edit', $a) }}"
                                            class="btn btn-outline-info me-2">Edit</a>
                                        <form action="{{ route('alamatPengiriman.destroy', $a) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="my-20 text-center">
                <div class=" h2">Kamu Belum Memiliki Alamat Apapun</div>

                <a href="{{ route('alamatPengiriman.create') }}" class="btn btn-primary btn-large">Tambahkan Alamat Baru
                    &nbsp;<i class="uil uil-plus"></i></a>
            </div>

        @endisset


        @if (session()->has('msg'))
            <div>
                <p>{{ session('msg') }}</p>
            </div>
        @endif
</div>
@endsection
