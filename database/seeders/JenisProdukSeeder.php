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

        JenisProduk::create([
            'nama' => "Original",
            'spesifikasi' => 'Dilengkapi tombol reset untuk mengubah kode kombinasi',
            'harga' => 260000,
            'stok' => 100,
            'produk_id' => 5
        ]);

        JenisProduk::create([
            'nama' => "Kuning",
            'spesifikasi' => 'Cocok untuk hujan-hujan',
            'harga' => 89000,
            'stok' => 100,
            'produk_id' => 6
        ]);
        
        JenisProduk::create([
            'nama' => "E27",
            'spesifikasi' => 'Warna: Putih',
            'harga' => 143000,
            'stok' => 100,
            'produk_id' => 7
        ]);
        JenisProduk::create([
            'nama' => "XL",
            'spesifikasi' => 'Warna: Putih',
            'harga' => 159000,
            'stok' => 100,
            'produk_id' => 8
        ]);
        JenisProduk::create([
            'nama' => "TM 30000",
            'spesifikasi' => 'Super durable',
            'harga' => 3159000,
            'stok' => 10,
            'produk_id' => 9
        ]);
    }
}
