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
                @if (count($nota) > 0)
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
                                        <img src="{{ isset($n->detailTransaksi[0]->produk->gambar[0]) ? asset('storage/' . $n->detailTransaksi[0]->produk->gambar[0]->path) : ''}}" alt="Product Image"
                                            class=" img rounded shadow" style="width:140px;height:140px;object-fit: cover;">
                                    </div>

                                    <div class="col-4">
                                        <h3 class="post-title h3">{{ $n->detailTransaksi[0]->produk->nama }}</h3>

                                        <label for="">Jenis: {{ $n->detailTransaksi[0]->nama }}</label>
                                        <p class="text-muted">{{ $n->detailTransaksi[0]->pivot->jumlah }} Barang x
                                            Rp{{ number_format($n->detailTransaksi[0]->pivot->sub_total / $n->detailTransaksi[0]->pivot->jumlah, 0, ',', '.') }}
                                        </p>
                                        <form action="{{ route('detailHistoriTransaksi') }}" method="post"
                                            id="formDetailHistori{{$n->id}}">
                                            @csrf
                                            <input type="hidden" name="id_nota" value="{{ $n->id }}">
                                            @isset($n->detailTransaksi[1])
                                                <a id="harga_total" class="hover"
                                                    onclick="document.getElementById('formDetailHistori{{$n->id}}').submit();"> +{{$n->detailTransaksi->sum('pivot.jumlah') - $n->detailTransaksi[0]->pivot->jumlah}} produk
                                                    Lainnya</a>
                                            @endisset
                                    </div>
                                    <div class="col-3 offset-3">
                                        <br>
                                        <p class="text-muted m-0">Total Belanja</p>
                                        <h3 class="post-title h3 m-0 mb-3">
                                            Rp{{ number_format($n->total_keseluruhan, 0, ',', '.') }}</h3>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Lihat Detail Transaksi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center my-2">
                        <p class="h2 text-primary">Belum Transaksi</p>
                        <img class="w-50" src="{{ asset('sandbox360\img\illustrations\empty.png') }}" />
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
