<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->double('total_pembayaran');
            $table->double('total_diskon');
            $table->double('total_pembayaran_diskon');
            $table->double('total_ppn');
            $table->enum('status_pengiriman', ['Menunggu Pembayaran', 'Persiapan Barang', 'Siap Diantar', 
                                'Pengiriman', 'Pesanan Diterima', 'Pesanan Selesai'])->default('Menunggu Pembayaran');
            $table->enum('status_pembayaran', ['Lunas', 'Belum Dibayar'])->default('Belum Dibayar');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('metode_pembayaran_id')->constrained();
            $table->foreignId('alamat_pengiriman_id')->constrained('alamat_pengirimans');
            $table->foreignId('jenis_pengiriman_id')->constrained('jenis_pengirimans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
