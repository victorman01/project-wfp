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
            'path'=>'sandbox360\img\photos\cf3.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Westafel',
            'path'=>'sandbox360\img\photos\cf2.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Bak Mandi',
            'path'=>'sandbox360\img\photos\cf1.jpg',
            'produk_id'=>3
        ]);
    }
}
