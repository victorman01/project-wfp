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
            'nama' => 'SolidTech',
        ]);
        Brand::create([
            'nama' => 'QuantumGear',
        ]);
        Brand::create([
            'nama' => 'EliteForce',
        ]);
        Brand::create([
            'nama' => 'SonicSpark',
        ]);
        Brand::create([
            'nama' => 'ProPulse',
        ]);
    }
}
