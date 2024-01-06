@extends('layouts.user.main')

@section('title')
    <title>Ubah Alamat Pengiriman</title>
@endsection

@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center h2">Ubah Alamat Pengiriman Baru</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('alamatPengiriman.update', $alamatPengiriman) }}">
                            @csrf
                            @method('put')

                            {{-- Nama --}}
                            <div class="row mb-3">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">Nama: </label>

                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama"
                                        value="{{ $alamatPengiriman->nama }}" required autocomplete="nama" autofocus>
                                </div>
                            </div>

                            {{-- Alamat --}}
                            <div class="row mb-3">
                                <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat: </label>

                                <div class="col-md-6">
                                    <input id="alamat" type="text" class="form-control" name="alamat"
                                        value="{{ $alamatPengiriman->alamat }}" required autocomplete="alamat">
                                </div>
                            </div>

                            {{-- Nama Penerima --}}
                            <div class="row mb-3">
                                <label for="nama_penerima" class="col-md-4 col-form-label text-md-end">Nama Penerima:
                                </label>

                                <div class="col-md-6">
                                    <input id="nama_penerima" type="text" class="form-control" name="nama_penerima"
                                        value="{{ $alamatPengiriman->nama_penerima }}" required
                                        autocomplete="nama_penerima">
                                </div>
                            </div>

                            {{-- Nomor Handphone --}}
                            <div class="row mb-3">
                                <label for="nomor_handphone" class="col-md-4 col-form-label text-md-end">Nomor Handphone:
                                </label>

                                <div class="col-md-6">
                                    <input id="nomor_handphone" type="text" class="form-control" name="nomor_handphone"
                                        value="{{ $alamatPengiriman->nomor_handphone }}" required
                                        autocomplete="nomor_handphone">
                                </div>
                            </div>

                            {{-- Provinsi --}}
                            <div class="row mb-3">
                                <label for="provinsi" class="col-md-4 col-form-label text-md-end">Provinsi: </label>

                                <div class="col-md-6">
                                    <input id="provinsi" type="text" class="form-control" name="provinsi"
                                        value="{{ $alamatPengiriman->provinsi }}" required autocomplete="provinsi">
                                </div>
                            </div>

                            {{-- Kota --}}
                            <div class="row mb-3">
                                <label for="kota" class="col-md-4 col-form-label text-md-end">Kota: </label>

                                <div class="col-md-6">
                                    <input id="kota" type="text" class="form-control" name="kota"
                                        value="{{ $alamatPengiriman->kota }}" required autocomplete="kota">
                                </div>
                            </div>

                            {{-- Kecamatan --}}
                            <div class="row mb-3">
                                <label for="kecamatan" class="col-md-4 col-form-label text-md-end">Kecamatan: </label>

                                <div class="col-md-6">
                                    <input id="kecamatan" type="text" class="form-control" name="kecamatan"
                                        value="{{ $alamatPengiriman->kecamatan }}" required autocomplete="kecamatan">
                                </div>
                            </div>

                            {{-- kelurahan_kode_pos --}}
                            <div class="row mb-3">
                                <label for="kelurahan_kode_pos" class="col-md-4 col-form-label text-md-end">Kelurahan &
                                    Kode Pos:
                                </label>

                                <div class="col-md-6">
                                    <input id="kelurahan_kode_pos" type="text" class="form-control"
                                        name="kelurahan_kode_pos" value="{{ $alamatPengiriman->kelurahan_kode_pos }}"
                                        required autocomplete="kelurahan_kode_pos">
                                </div>
                            </div>

                            {{-- Alamat Utama --}}
                            <div class="row mb-3 align-items-center">
                                <label for="alamat_utama" class="col-md-4 col-form-label text-md-end">Alamat Utama:
                                </label>

                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input type="radio" name="alamat_utama"
                                            class="form-check-input {{ $alamatPengiriman->alamat_utama == 1 ? 'checked' : '' }}"
                                            value="1" checked><label for="">Ya</label>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input type="radio" name="alamat_utama"
                                            class="form-check-input {{ $alamatPengiriman->alamat_utama == 1 ? 'checked' : '' }}"
                                            value="0"><label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p>Gagal: </p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
