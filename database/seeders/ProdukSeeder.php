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
            'nama'=>'Pompa Air',
            'brand_id'=>mt_rand(1,5),
            'informasi'=>'TPraktis serta mudah digunakan',
        ]);
        Produk::create([
            'nama'=>'Rak Besi',
            'brand_id'=>mt_rand(1,5),
            'informasi'=>'Rak penyimpanan 5 tingkat',
        ]);
        Produk::create([
            'nama'=>'Brankas',
            'brand_id'=>mt_rand(1,5),
            'informasi'=>'Ambalan adjustable',
        ]);
        Produk::create([
            'nama'=>'Drip Coffee',
            'brand_id'=>mt_rand(1,5),
            'informasi'=>'Anti-drip valve',
        ]);
    }
}
