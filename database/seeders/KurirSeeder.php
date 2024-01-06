<?php

namespace Database\Seeders;

use App\Models\Kurir;
use Illuminate\Database\Seeder;

class KurirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kurir::create([
            'nama'=>'JNE',
        ]);
        Kurir::create([
            'nama'=>'JNT',
        ]);
        Kurir::create([
            'nama'=>'SiCepat',
        ]);
    }
}
