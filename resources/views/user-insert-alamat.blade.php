@extends('layouts.home')

@section('content')
    <form action="{{ route('alamatPengiriman.store') }}" method="post">
        {{-- Alamat --}}
        <div>
            <label for="alamat">Alamat: </label>
            <input type="text" name="alamat" id="alamat">
        </div>

        {{-- Nama Penerima --}}
        <div>
            <label for="namaPenerima">Nama Penerima: </label>
            <input type="text" name="namaPenerima" id="namaPenerima">
        </div>

        {{-- Nomor Handphone --}}
        <div>
            <label for="nomorHandphone">Nomor Handphone: </label>
            <input type="text" name="nomorHandphone" id="nomorHandphone">
        </div>

        
        {{-- Provinsi --}}
        <div>
            <label for="provinsi">Provinsi: </label>
            <input type="text" name="provinsi" id="provinsi">
        </div>

        {{-- Kota --}}
        <div>
            <label for="kota">Kota: </label>
            <input type="text" name="kota" id="kota">
        </div>

        {{-- Kecamatan --}}
        <div>
            <label for="kecamatan">Kecamatan: </label>
            <input type="text" name="kecamatan" id="kecamatan">
        </div>

        {{-- Kelurahan --}}
        <div>
            <label for="kelurahan">Kelurahan: </label>
            <input type="text" name="kelurahan" id="kelurahan">
        </div>

        {{-- Kode Pos --}}
        <div>
            <label for="kodePos">Kode Pos: </label>
            <input type="text" name="kodePos" id="kodePos">
        </div>

        {{-- Alamat Utama --}}
        <div>
            <label for="alamatUtama">Jadikan Alamat Utama: </label>
            <input type="radio" name="alamatUtama"><label for="">Ya</label>
            <input type="radio" name="alamatUtama"><label for="">Tidak</label>
        </div>


        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection