@extends('layouts.user.main')

@section('title')
    <title>Invoice</title>
@endsection

@section('content')
    <div class="container mt-3">
        <a href="{{ route('historiTransaksi') }}" class="btn btn-outline-primary">Kembali</a>
    </div>
    <div class="container my-5 mb-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice #{{ $nota->id }} <span
                                    class="badge bg-success font-size-12 ms-2">{{ $nota->status_pembayaran }}</span></h4>
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">ACEZ</h2>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Ditunjukkan Kepada:</h5>
                                    <h5 class="font-size-15 mb-2">{{ $nota->alamatPengiriman->nama_penerima }}
                                        ({{ $nota->alamatPengiriman->nama }})</h5>
                                    <p class="mb-1">{{ $nota->alamatPengiriman->alamat }}</p>
                                    <p class="mb-1">{{ $nota->alamatPengiriman->kota }},
                                        {{ $nota->alamatPengiriman->provinsi }}</p>
                                    <p>{{ $nota->alamatPengiriman->nomor_handphone }}</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-15 mb-1">No Nota:</h5>
                                        <p>#{{ $nota->id }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Tanggal Nota:</h5>
                                        <p>{{ date('d F Y', strtotime($nota->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary</h5>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @for ($i = 0; $i < count($detailInvoice); $i++)
                                            <tr>
                                                <th scope="row">{{ $i + 1 }}</th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $detailInvoice[$i]->produk->nama }}</h5>
                                                        <p class="text-muted mb-0">{{ $detailInvoice[$i]->nama_jenis }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $detailInvoice[$i]->pivot->sub_total / $detailInvoice[$i]->pivot->jumlah }}</td>
                                                <td>{{ $detailInvoice[$i]->pivot->jumlah }}</td>
                                                <td class="text-end">{{ $detailInvoice[$i]->pivot->sub_total }}</td>
                                            </tr>
                                        @endfor
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                            <td class="text-end">Rp{{ number_format($nota->total_pembayaran, 0, ',', '.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Discount :</th>
                                            <td class="border-0 text-end">- Rp{{ number_format($nota->total_diskon, 0, ',', '.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Harga Pengiriman :</th>
                                            <td class="border-0 text-end">Rp{{ number_format($nota->jenisPengiriman->harga, 0, ',', '.') }} </td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Pajak</th>
                                            <td class="border-0 text-end">Rp{{ number_format($nota->total_ppn, 0, ',', '.') }}</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">Rp{{ number_format(($nota->total_keseluruhan), 0, ',', '.') }}</h4>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>

    <div class="mb-10"></div>
@endsection
