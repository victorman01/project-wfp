<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon_produks', function (Blueprint $table) {
            $table->id();
            $table->integer('diskon')->length(3);
            $table->timestamp('periode_mulai')->default(now());
            $table->timestamp('periode_berakhir')->default(now()->addDay());
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
        Schema::dropIfExists('diskon_produks');
    }
}
