<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisProduk;

class JenisProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisProduk::create([
            'nama_jenis' => "Jenis Produk 1",
            'spesifikasi'=> 'Bahan Bagus',
            'harga'=>100000,
            'stok'=>100,
            'brand_id'=>mt_rand(1,3),
            'produk_id' => mt_rand(1,3)
        ]);

        JenisProduk::create([
            'nama_jenis' => "Jenis Produk 2",
            'spesifikasi'=> 'Bahan Bagus',
            'harga'=>100000,
            'stok'=>100,
            'brand_id'=>mt_rand(1,3),
            'produk_id' => mt_rand(1,3)
        ]);

        JenisProduk::create([
            'nama_jenis' => "Jenis Produk 3",
            'spesifikasi'=> 'Bahan Bagus',
            'harga'=>100000,
            'stok'=>100,
            'brand_id'=>mt_rand(1,3),
            'produk_id' => mt_rand(1,3)
        ]);
    }
}
