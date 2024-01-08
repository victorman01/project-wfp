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
            'nama' => "Biasa",
            'spesifikasi' => 'Menuang air lebih mudah & praktis
            Desain minimalis & modern
            Praktis serta mudah digunakan',
            'harga' => 79000,
            'stok' => 100,
            'produk_id' => 1
        ]);

        JenisProduk::create([
            'nama' => "Super",
            'spesifikasi' => 'Praktis serta mudah digunakan
            Memompa hingga 100 liter
            Dilengkapi lampu indikator penanda daya baterai rendah',
            'harga' => 900000,
            'stok' => 100,
            'produk_id' => 1
        ]);

        JenisProduk::create([
            'nama' => "Pendek",
            'spesifikasi' => 'Rak penyimpanan 5 tingkat yang serbaguna',
            'harga' => 50000,
            'stok' => 100,
            'produk_id' => 2
        ]);

        JenisProduk::create([
            'nama' => "Sedang",
            'spesifikasi' => 'Cocok untuk kebutuhan rumah tangga, perkantoran, gudang, atau area lainnya',
            'harga' => 70000,
            'stok' => 100,
            'produk_id' => 2
        ]);

        JenisProduk::create([
            'nama' => "Tinggi",
            'spesifikasi' => 'Ambalan adjustable',
            'harga' => 90000,
            'stok' => 100,
            'produk_id' => 2
        ]);

        JenisProduk::create([
            'nama' => "Original",
            'spesifikasi' => 'Dilengkapi tombol reset untuk mengubah kode kombinasi',
            'harga' => 300000,
            'stok' => 100,
            'produk_id' => 3
        ]);

        JenisProduk::create([
            'nama' => "Original",
            'spesifikasi' => 'Dilengkapi tombol reset untuk mengubah kode kombinasi',
            'harga' => 300000,
            'stok' => 100,
            'produk_id' => 4
        ]);
    }
}
