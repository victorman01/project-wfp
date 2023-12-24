<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'nama'=>'Kloset',
            'brand_id'=>mt_rand(1,3),
            'informasi'=>'Terbuat dari batu',
        ]);
        Produk::create([
            'nama'=>'Westafel',
            'brand_id'=>mt_rand(1,3),
            'informasi'=>'Terbuat dari batu',
        ]);
        Produk::create([
            'nama'=>'Bak Mandi',
            'brand_id'=>mt_rand(1,3),
            'informasi'=>'Terbuat dari batu',
        ]);
    }
}
