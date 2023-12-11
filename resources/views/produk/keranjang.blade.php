@extends('layouts.user.main')

@section('title')
    <title>Charts</title>
@endsection

@section('content')
    {{-- Keranjang --}}
    <section class="bg-white py-10">

        <div class="container py-2 my-5">
            <div class="row">
                <div class="col-8">
                    <div class="card card-border-start border-primary">
                        <div class="card-body">
                            <h2 class="post-title h2">Chart Item(s)
                            </h2>

                            <hr class="dropdown-divider">

                            @foreach ($keranjang as $k)
                                {{-- Loops Here --}}
                                <div class="d-flex justify-content-start my-5">
                                    <img src="https://picsum.photos/150/150" alt="Product Image" class="img-fluid rounded-4">

                                    <div class="container py-1">
                                        <div class="row ms-2">
                                            <h3 class="post-title h3">{{ $k->nama }}</h3>
                                            <p class="text-muted">{{ $k->spesifikasi }}</p>
                                            <p id="harga_total{{ $k->id }}">Rp{{ $k->harga }},-</p>
                                            <input type="hidden" id="harga_barang{{ $k->id }}"
                                                value="{{ $k->harga }}">
                                        </div>
                                    </div>


                                    <div class="d-flex flex-column justify-content-between align-items-end">
                                        <a class="btn btn-sm btn-danger"><i class="uil uil-trash"></i> </a>
                                        <input class="form-control" id="jum_barang{{ $k->id }}" type="number"
                                            onchange="setHargaProduk(this.id)" value="1" min="1">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-4">
                    <div class="card card-border-end border-success">
                        <div class="card-body">
                            <h3 class="post-title h3">Total Price: Rp10.000,-
                            </h3>

                            <h3 class="post-title h3">Total Item(s): 1
                            </h3>

                            <hr class="dropdown-divider">

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-outline-success btn-sm" href="{{ route('checkout') }}">Buy</a>
                            </div>

                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        $("[type='number']").keypress(function(evt) {
            evt.preventDefault();
        });

        let harga_keseluruhan = 0

        function setHargaProduk(idBarang) {
            // Get raw ID
            let rawID = idBarang.replace(/[^0-9]/g, "");
            let jumBarang = $("#jum_barang" + rawID).val()
            let hargaBarang = $('#harga_barang' + rawID).val()
            let hargaTotal = hargaBarang * jumBarang

            $('#harga_total' + rawID).html("Rp" + hargaTotal + ",-");

            // butuh fungsi untuk mengambil harga keseluruhan
        };
    </script>
@endsection
