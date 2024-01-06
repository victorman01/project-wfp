<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama'=>'Kamar Mandi',
        ]);
        Kategori::create([
            'nama'=>'Toilet',
        ]);
        Kategori::create([
            'nama'=>'WC',
        ]);
    }
}
