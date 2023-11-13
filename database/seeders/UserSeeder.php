<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'alvin',
            'email' => 'alvinfersus@gmail.com',
            'password' => Hash::make('alvin123'),
            'nomor_handphone' => '085733181815',
            'tgl_lahir' => now(),
            'point' => 0,
            'jenis_kelamin' => 'L',
            'provinsi' => 'Jawa Timur',
            'kota' => 'Surabaya',
            'kecamatan' => 'Simokerto'
        ]);
    }
}
