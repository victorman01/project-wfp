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
            'informasi'=>'Terbuat dari batu',
        ]);
        Produk::create([
            'nama'=>'Westafel',
            'informasi'=>'Terbuat dari batu',
        ]);
        Produk::create([
            'nama'=>'Bak Mandi',
            'informasi'=>'Terbuat dari batu',
        ]);
    }
}
