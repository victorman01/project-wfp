<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\DiskonProduk;
use Illuminate\Database\Seeder;

class DiskonProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiskonProduk::create([
            'diskon' => mt_rand(0, 99),
            'periode_mulai' => Carbon::today(),
            'periode_berakhir' => Carbon::today()->addDays(7),
            'jenis_produk_id' => mt_rand(1, 3),
        ]);
        DiskonProduk::create([
            'diskon' => mt_rand(0, 99),
            'periode_mulai' => Carbon::today(),
            'periode_berakhir' => Carbon::today()->addDays(7),
            'jenis_produk_id' => mt_rand(1, 3),
        ]);
        DiskonProduk::create([
            'diskon' => mt_rand(0, 99),
            'periode_mulai' => Carbon::today(),
            'periode_berakhir' => Carbon::today()->addDays(7),
            'jenis_produk_id' => mt_rand(1, 3),
        ]);
    }
}
