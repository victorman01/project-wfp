@extends('layouts.user.main')

@section('title')
    <title>Histori Transaksi</title>
@endsection

@section('content')
    {{-- PROGRESS LIST --}}
    <div class="card my-5">
        <div class="card-header">
            <h4 class="card-title">Histori Transaksi</h4>
        </div>
        <div class="card-body text-center">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Produk</th>
                            <th>Total Harga</th>
                            <th>Detail Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-start">
                                <ul>
                                    <li>Produk 1</li>
                                    <li>Produk 2</li>
                                </ul>
                            </td>
                            <td>Rp100.000,-</td>
                            <td>
                              <a href="{{route('detailHistoriTransaksi')}}" class="btn btn-primary">Lihat Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
