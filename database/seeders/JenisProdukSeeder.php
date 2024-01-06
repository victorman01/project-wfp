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
            'nama' => "Jenis Produk 1",
            'spesifikasi'=> 'Bahan Bagus',
            'harga'=>100000,
            'stok'=>100,
            'produk_id' => 1
        ]);

        JenisProduk::create([
            'nama' => "Jenis Produk 2",
            'spesifikasi'=> 'Bahan Bagus',
            'harga'=>100000,
            'stok'=>100,
            'produk_id' => 2
        ]);

        JenisProduk::create([
            'nama' => "Jenis Produk 3",
            'spesifikasi'=> 'Bahan Bagus',
            'harga'=>100000,
            'stok'=>100,
            'produk_id' => 3
        ]);
    }
}
