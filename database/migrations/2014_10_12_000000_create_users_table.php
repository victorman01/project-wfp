<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->string('email', 45)->unique();
            $table->text('password');
            $table->string('nomor_handphone', 45);
            $table->timestamp('tgl_lahir');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->string('provinsi', 45);
            $table->string('kota', 45);
            $table->string('kecamatan', 45);
            $table->foreignId('role_id')->constrained('roles');
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
        Schema::dropIfExists('users');
    }
}
