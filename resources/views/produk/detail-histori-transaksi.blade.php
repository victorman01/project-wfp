@extends('layouts.user.main')

@section('title')
    <title>Histori Transaksi</title>
@endsection

@section('content')
    <div class="container mt-3"> 
      <a href="{{route('historiTransaksi')}}" class="btn btn-outline-primary">Kembali</a>
    </div>
    <div class="container my-5 mb-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice #DS0204 <span
                                    class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">Nama Brand</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                                <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Ditunjukkan Kepada:</h5>
                                    <h5 class="font-size-15 mb-2">John Doe</h5>
                                    <p class="mb-1">Jln tenggilis Mejoyo 1</p>
                                    <p class="mb-1">johndoe@gmail.com</p>
                                    <p>001-234-5678</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-15 mb-1">No Nota:</h5>
                                        <p>#DZ0112</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Tanggal Nota:</h5>
                                        <p>12 Oct, 2020</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">No Order:</h5>
                                        <p>#1123456</p>
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
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">Black Strap A012</h5>
                                                    <p class="text-muted mb-0">Watch, Black</p>
                                                </div>
                                            </td>
                                            <td>Rp245.000,-</td>
                                            <td>1</td>
                                            <td class="text-end">Rp245.000,-</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row">02</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">Stainless Steel S010</h5>
                                                    <p class="text-muted mb-0">Watch, Gold</p>
                                                </div>
                                            </td>
                                            <td>Rp245.000,-</td>
                                            <td>2</td>
                                            <td class="text-end">Rp490.000.-</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                            <td class="text-end">Rp735.000,-</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Discount :</th>
                                            <td class="border-0 text-end">- Rp25.000,-</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Harga Pengiriman :</th>
                                            <td class="border-0 text-end">Rp20.000,-</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Pajak</th>
                                            <td class="border-0 text-end">Rp73.500,-</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">Rp739.000,-</h4>
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
