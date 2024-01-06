<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->longtext('spesifikasi');
            $table->double('harga');
            $table->integer('stok');
            $table->foreignId('produk_id')->constrained();
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
        Schema::dropIfExists('jenis_produks');
    }
}
