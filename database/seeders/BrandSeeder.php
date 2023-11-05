<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'nama'=>'TOTO',
        ]);
        Brand::create([
            'nama'=>'SOSO',
        ]);
        Brand::create([
            'nama'=>'BOBO',
        ]);
    }
}
