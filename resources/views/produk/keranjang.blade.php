@extends('layouts.user.main')

@section('title')
    <title>Keranjang</title>
@endsection

@section('content')
    {{-- Keranjang --}}
    <section class="bg-white py-10">

        <div class="container py-2 my-5">
            <div class="row">
                <div class="col-8">
                    <div class="card card-border-start border-primary">
                        <div class="card-body">
                            @if ($keranjang != null)
                                <h2 class="post-title h2">Barang Keranjang
                                </h2>

                                <hr class="dropdown-divider">
                                <form action="{{ route('checkoutIndex') }}" id="form_pembelian">
                                    @foreach ($keranjang as $k)
                                        {{-- Loops Here --}}
                                        <div class="d-flex justify-content-start my-5"
                                            id="container_produk{{ $k->id }}">

                                            {{-- Pilih Barang Yang Akan Dibeli --}}
                                            <div class="me-2">
                                                <input type="checkbox" name="produk_pilihan[]" id="checkbox{{ $k->id }}"
                                                    class="form-check-input border p-3" value="{{ $k->id }}" onchange="ubahCheckbox(this.id)" checked>
                                            </div>

                                            <img src="{{ isset($k->produk->gambar[0]->path) ? asset('storage/' . $k->produk->gambar[0]->path) : '' }}"
                                                alt="Product Image" class="img rounded shadow"
                                                style="width:200px;height:200px;object-fit: cover;">

                                            <div class="container py-1">

                                                <div class="row">
                                                    <label for="">Pilih Produk {{ $k->produk->nama }}</label>

                                                    <h3 class="post-title h3">{{ $k->produk->nama }}</h3>
                                                    <p class="text-muted">Spesifikasi: {{ $k->spesifikasi }}</p>
                                                    <p id="harga_total{{ $k->id }}">
                                                        Rp{{ number_format($k->harga, 0, ',', '.') }},-</p>
                                                    <input type="hidden" id="harga_barang{{ $k->id }}"
                                                        value="{{ $k->harga }}">
                                                </div>
                                            </div>


                                            <div class="d-flex flex-column justify-content-between align-items-end">
                                                <a class="btn btn-sm btn-danger"
                                                    onclick="hapusProduk('{{ $k->id }}')"><i
                                                        class="uil uil-trash"></i> </a>
                                                <input class="form-control" id="jum_barang{{ $k->id }}"
                                                    type="number" 
                                                    oninput="setHargaProduk(this.id)"
                                                    value="{{ $k->pivot->jumlah }}" min="1">
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            @else
                                <div class="text-center my-2">
                                    <p class="h2 text-primary">Keranjang masih kosong</p>
                                    <img class="w-50"
                                        src="{{ asset('sandbox360\img\illustrations\empty_chart.jpg') }}" />
                                </div>
                            @endif
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-4">
                    <div class="card card-border-end border-success">
                        <div class="card-body">
                            <input type="hidden" id="total_price_val" name="total_price_val" value="{{ $total_price }}">
                            <h3 class="post-title h3">Total Harga: Rp. <span
                                    id="total_price">{{ number_format($total_price, 0, ',', '.') }},-</span>
                            </h3>

                            <h3 class="post-title h3" id="total_item">Jumlah Barang:
                                {{ $keranjang != null ? $total_item : 0 }}</h3>

                            <hr class="dropdown-divider">

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-outline-success btn-sm" onclick="submitForm()">Buy</a>
                            </div>

                        </div>
                        <!--/.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                @if (session('msg'))
                    <div class="alert alert-danger">
                        {{ session('msg') }}
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        let harga_keseluruhan = 0

        function setHargaProduk(idBarang) {
            // Get raw ID   
            let rawID = idBarang.replace(/[^0-9]/g, "");
            let jumBarang = $("#jum_barang" + rawID).val()
            let hargaBarang = $('#harga_barang' + rawID).val()

            //Prevent Submit kalau kosong jumBarang nya
            if(jumBarang === "" || jumBarang === null || isNaN(jumBarang) || parseInt(jumBarang) <= 0){
                return
            }

            let hargaTotal = hargaBarang * jumBarang //PERLU DIPERBAIKI SUPAYA REALTIME MESKIPUN DICLICK DENGAN CEPAT
            //AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route('updateKeranjang') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'idJenisProduk': rawID,
                    'jumlah': jumBarang
                },
                success: function(data) {
                    if (data.pesan == 'Gagal') {
                        alert("gagal update keranjang");
                    } else {
                        //Update harga total
                        // $('#harga_total' + rawID).html("Rp" + data.totalHarga + ",-");   
                        var totalItem = document.getElementById("total_item");
                        totalItem.innerHTML = "Jumlah Barang: " +  data.jumlahBarang;

                        // Fungsi untuk mengambil harga keseluruhan
                        // var inputElement = document.getElementById(idBarang);
                        // var previousValue = inputElement.defaultValue;
                        // var currentValue = inputElement.value;

                        // inputElement.defaultValue = inputElement.value
                        // let hargaTotalSebelumnya = 0
                        // hargaTotalSebelumnya = hargaBarang * (previousValue)

                        // let totalHarga = $("#total_price_val").val() - hargaTotalSebelumnya + hargaTotal
                        $("#total_price_val").val(data.totalHarga)

                        $('#total_price').html(data.totalHarga.toLocaleString('id-ID') + ",-");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error response and display the error message
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                        alert(jqXHR.responseJSON.error);
                    } else {
                        alert('An error occurred while processing your request.');
                    }
                }
            })
        }

        function hapusProduk(idContainer) {
            //AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route('hapusKeranjang') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'idJenisProduk': idContainer
                },
                success: function(data) {
                    if (data.pesan == 'Gagal') {
                        alert("gagal update keranjang");
                    } else {
                        //Update total harga dari seluruh produk
                        // let hargaTotalDihapus = $("#harga_total" + idContainer).html().replace(/[^0-9]/g, "")
                        // let totalHarga = $("#total_price_val").val() - parseInt(hargaTotalDihapus)
                        // $("#total_price_val").val(totalHarga)
                        // $('#total_price').html(totalHarga + ",-");
                        var totalItemChange = document.getElementById("total_item");
                        totalItemChange.innerHTML = "Jumlah Barang: " +  data.jumlahBarang;
                        $("#total_price_val").val(data.totalHarga)
                        $('#total_price').html(data.totalHarga.toLocaleString('id-ID') + ",-");

                        //Hapus isi dari container yang bersangkutan
                        $('#container_produk' + idContainer).html('');

                        //Mengurangi total item
                        let totalItem = totalItemChange.innerHTML.replace(/[^0-9]/g, "")

                        if ((totalItem) == 0) {
                            $('#container_produk' + idContainer).html(`<div class="text-center my-2">
                                    <p class="h2 text-primary">Keranjang masih kosong</p>
                                    <img class="w-50"
                                        src="{{ asset('sandbox360/img/illustrations/empty_chart.jpg') }}" />
                                </div>`);
                        }

                        // $("#total_item").html("Total Item(s): " + (parseInt(totalItem) - 1).toString())
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error response and display the error message
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error) {
                        alert(jqXHR.responseJSON.error);
                    } else {
                        alert('An error occurred while processing your request.');
                    }
                }
            })
        }

        function ubahCheckbox(id){
            var rawID = id.replace(/[^0-9]/g, "");
            var hargaBarang = document.getElementById("harga_barang" + rawID).value;
            var jumlahBarang = parseInt(document.getElementById("jum_barang" + rawID).value);
            var totalHarga = hargaBarang * jumlahBarang;

            var totalItem = document.getElementById("total_item");
            var totalBarang = parseInt(totalItem.innerHTML.replace(/[^0-9]/g, ""));

            var totalPriceTag = document.getElementById("total_price");
            var totalPrice = parseInt(totalPriceTag.innerHTML.replace(/[^0-9]/g, ""));

            if(document.getElementById(id).checked){
                totalPriceTag.innerHTML = (totalPrice+totalHarga).toLocaleString('id-ID');
                totalItem.innerHTML = "Jumlah Barang: " +  (totalBarang + jumlahBarang).toString();
            } else {
                totalPriceTag.innerHTML = (totalPrice-totalHarga).toLocaleString('id-ID');
                totalItem.innerHTML = "Jumlah Barang: " +  (totalBarang - jumlahBarang).toString();
            }
        }

        function submitForm() {
            var form = document.getElementById("form_pembelian");
            form.submit();
        }
    </script>
@endsection
