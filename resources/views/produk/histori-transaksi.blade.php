@extends('layouts.user.main')

@section('title')
    <title>Histori Transaksi</title>
@endsection

@section('content')
    <div class="container ">
        {{-- CARD DAFTAR TRANSAKSI --}}
        <div class="card my-10 mb-20">
            <div class="card-header ">
                <h2 class="text-center text-primary">Detail Transaksi</h2>
            </div>
            <div class="card-body">
                @foreach ($nota as $n)
                    {{-- CARD TRANSAKSI --}}
                    <div class="card my-3">
                        <div class="card-header">
                            <h5 class="card-title">Belanja, {{ date('d F Y', strtotime($n->created_at)) }} <span
                                    class="badge bg-success rounded">{{ $n->status_pengiriman }}</span>
                            </h5>
                        </div>
                        <div class="card-body p-2 px-8">
                            <div class="row my-5" id="histori_transaksi">
                                <div class="col-2 text-end">
                                    <img src="{{ asset('sandbox360\img\photos\cf3.jpg') }}" alt="Product Image"
                                        class=" img rounded shadow" style="width:140px;height:140px;object-fit: cover;">
                                </div>

                                <div class="col-4">
                                    <h3 class="post-title h3">{{ $n->detail_transaksi[0]->produk->nama }}</h3>
                                    
                                    <label for="">Jenis: {{ $n->detail_transaksi[0]->nama }}</label>
                                    <p class="text-muted">{{ $n->detail_transaksi[0]->pivot->jumlah }} Barang x Rp{{ number_format($n->detail_transaksi[0]->pivot->sub_total / $n->detail_transaksi[0]->pivot->jumlah, 0, ',', '.') }}</p>
                                    <form action="{{ route('detailHistoriTransaksi') }}" method="post" id="formDetailHistori">
                                        @csrf
                                        <input type="hidden" name="id_nota" value="{{ $n->id }}">
                                        @isset($n->detail_transaksi[1])
                                            <a id="harga_total" class="hover" onclick="document.getElementById('formDetailHistori').submit();">+1 produk Lainnya</a>
                                        @endisset
                                </div>  
                                <div class="col-3 offset-3">
                                    <br>
                                    <p class="text-muted m-0">Total Belanja</p>
                                    <h3 class="post-title h3 m-0 mb-3">Rp{{ number_format($n->total_keseluruhan, 0, ',', '.') }}</h3>
                                </div>
                                <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Lihat Detail Transaksi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
