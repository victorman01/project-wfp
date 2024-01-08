<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nota;

class NotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nota::create([
            'total_pembayaran' => 1000000,
            'total_diskon' => 100000,
            'total_pembayaran_diskon' =>900000,
            'total_ppn' => 99000,
            'total_keseluruhan' =>1000000,
            'status_pengiriman' => 'Siap Diantar',
            'status_pembayaran' => 'Lunas',
            'user_id' => 1,
            'metode_pembayaran_id' => 1,
            'alamat_pengiriman_id' => 1,
            'jenis_pengiriman_id' => 1,

        ]);

        Nota::create([
            'total_pembayaran' => 100000000,
            'total_diskon' => 10000000,
            'total_pembayaran_diskon' =>90000000,
            'total_ppn' => 9900000,
            'total_keseluruhan' =>100000000,
            'status_pengiriman' => 'Siap Diantar',
            'status_pembayaran' => 'Lunas',
            'user_id' => 1,
            'metode_pembayaran_id' => 1,
            'alamat_pengiriman_id' => 1,
            'jenis_pengiriman_id' => 1,

        ]);

        Nota::create([
            'total_pembayaran' => 100000000,
            'total_diskon' => 10000000,
            'total_pembayaran_diskon' =>90000000,
            'total_ppn' => 9900000,
            'total_keseluruhan' =>100000000,
            'status_pengiriman' => 'Siap Diantar',
            'status_pembayaran' => 'Lunas',
            'user_id' => 1,
            'metode_pembayaran_id' => 1,
            'alamat_pengiriman_id' => 1,
            'jenis_pengiriman_id' => 1,

        ]);
    }
}
