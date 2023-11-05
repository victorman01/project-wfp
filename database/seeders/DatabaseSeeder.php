<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Brand::create([
            'nama'=>'TOTO',
        ]);
        Brand::create([
            'nama'=>'SOSO',
        ]);
        Brand::create([
            'nama'=>'BOBO',
        ]);

        Kategori::create([
            'nama'=>'Kamar Mandi',
        ]);
        Kategori::create([
            'nama'=>'Toilet',
        ]);
        Kategori::create([
            'nama'=>'WC',
        ]);

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
