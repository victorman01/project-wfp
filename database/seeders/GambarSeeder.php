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
            'nama'=>'Pompa Air 1',
            'path'=>'pompa_air_1.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Pompa Air 2',
            'path'=>'pompa_air_2.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Pompa Air 3',
            'path'=>'pompa_air_3.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Pompa Air 4',
            'path'=>'pompa_air_4.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 1',
            'path'=>'rak_besi_1.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 2',
            'path'=>'rak_besi_2.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 3',
            'path'=>'rak_besi_3.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 4',
            'path'=>'rak_besi_4.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Brankas 1',
            'path'=>'brankas_1.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Brankas 2',
            'path'=>'brankas_2.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Brankas 3',
            'path'=>'brankas_3.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Brankas 4',
            'path'=>'brankas_4.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 1',
            'path'=>'drip_coffee_1.jpg',
            'produk_id'=>4
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 2',
            'path'=>'drip_coffee_2.jpg',
            'produk_id'=>4
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 3',
            'path'=>'drip_coffee_3.jpg',
            'produk_id'=>4
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 4',
            'path'=>'drip_coffee_4.jpg',
            'produk_id'=>4
        ]);
    }
}
