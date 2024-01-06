@extends('layouts.user.main')

@section('content')
    <form action="{{ route('alamatPengiriman.store') }}" method="post">
        @csrf
        {{-- Nama Alamat --}}
        <div>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
        </div>

        {{-- Alamat --}}
        <div>
            <label for="alamat">Alamat: </label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">
        </div>

        {{-- Nama Penerima --}}
        <div>
            <label for="nama_penerima">Nama Penerima: </label>
            <input type="text" name="nama_penerima" id="nama_penerima" value="{{ old('nama_penerima') }}">
        </div>

        {{-- Nomor Handphone --}}
        <div>
            <label for="nomor_handphone">Nomor Handphone: </label>
            <input type="text" name="nomor_handphone" id="nomor_handphone" value="{{ old('nomor_handphone') }}">
        </div>


        {{-- Provinsi --}}
        <div>
            <label for="provinsi">Provinsi: </label>
            <input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}">
        </div>

        {{-- Kota --}}
        <div>
            <label for="kota">Kota: </label>
            <input type="text" name="kota" id="kota" value="{{ old('kota') }}">
        </div>

        {{-- Kecamatan --}}
        <div>
            <label for="kecamatan">Kecamatan: </label>
            <input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}">
        </div>

        {{-- kelurahan_kode_pos --}}
        <div>
            <label for="kelurahan_kode_pos">Kelurahan: </label>
            <input type="text" name="kelurahan_kode_pos" id="kelurahan_kode_pos" value="{{ old('kelurahan_kode_pos') }}">
        </div>

        {{-- Kode Pos --}}
        {{-- <div>
            <label for="kodePos">Kode Pos: </label>
            <input type="text" name="kodePos" id="kodePos">
        </div> --}}

        {{-- Alamat Utama --}}
        <div>
            <label for="alamat_utama">Jadikan Alamat Utama: </label><br>
            <input type="radio" name="alamat_utama" class="form-check-input" value="1"><label
                for="">Ya</label>
            <input type="radio" name="alamat_utama" class="form-check-input" value="0"><label
                for="">Tidak</label>
        </div>


        <div>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('msg'))
            <div class="alert alert-danger">
                {{ session('msg') }}
            </div>
        @endif
    </form>
@endsection
