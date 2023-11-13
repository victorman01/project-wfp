<?php

namespace Database\Seeders;

use App\Models\Gambar;
use Illuminate\Database\Seeder;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gambar::create([
            'nama'=>'Kloset',
            'path'=>'ehh',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Westafel',
            'path'=>'ehh',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Bak Mandi',
            'path'=>'ehh',
            'produk_id'=>3
        ]);
    }
}
