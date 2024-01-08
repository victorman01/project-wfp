<?php

namespace Database\Seeders;

use App\Models\DetailTransaksi;
use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailTransaksi::create([
            'jumlah' => 10,
            'sub_total' =>1000000,
            'diskon' =>100000,
            'besar_diskon' =>10,
            'jenis_produk_id' =>2,
            'nota_id' =>1,
        ]);

        DetailTransaksi::create([
            'jumlah' => 1000,
            'sub_total' =>100000000,
            'diskon' =>10000000,
            'besar_diskon' =>10,
            'jenis_produk_id' =>1,
            'nota_id' =>2,
        ]);

        DetailTransaksi::create([
            'jumlah' => 1000,
            'sub_total' =>100000000,
            'diskon' =>10000000,
            'besar_diskon' =>10,
            'jenis_produk_id' =>4,
            'nota_id' =>3,
        ]);
    }
}
