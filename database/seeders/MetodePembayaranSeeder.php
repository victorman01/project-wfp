<?php

namespace Database\Seeders;

use App\Models\MetodePembayaran;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetodePembayaran::create([
            'nama' => 'OVO'
        ]);

        MetodePembayaran::create([
            'nama' => 'Gopay'
        ]);

        MetodePembayaran::create([
            'nama' => 'Dana'
        ]);
    }
}
