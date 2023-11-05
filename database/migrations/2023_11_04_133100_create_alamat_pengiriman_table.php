<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatPengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_pengirimans', function (Blueprint $table) {
            $table->id();   
            $table->longtext('alamat');
            $table->string('nama_penerima', 45);
            $table->string('nomor_handphone', 45);
            $table->string('provinsi', 45);
            $table->string('kota', 45);
            $table->string('kecamatan', 45);
            $table->string('kelurahan_kode_pos', 45);
            $table->tinyInteger('alamat_utama');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('alamat_pengirimans');
    }
}
