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
            'spesifikasi'=> 'Bahan Bagus',
            'informasi'=>'Terbuat dari batu',
            'harga'=>100000,
            'stok'=>100,
            'brand_id'=>mt_rand(1,3)
        ]);
        Produk::create([
            'nama'=>'Westafel',
            'spesifikasi'=> 'Bahan Bagus',
            'informasi'=>'Terbuat dari batu',
            'harga'=>100000,
            'stok'=>100,
            'brand_id'=>mt_rand(1,3)
        ]);
        Produk::create([
            'nama'=>'Bak Mandi',
            'spesifikasi'=> 'Bahan Bagus',
            'informasi'=>'Terbuat dari batu',
            'harga'=>100000,
            'stok'=>100,
            'brand_id'=>mt_rand(1,3)
        ]);
    }
}
