<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pelanggan;
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
        $pelanggan = User::create([
            'nama' => 'alvin',
            'email' => 'alvinfersus@gmail.com',
            'password' => Hash::make('alvin123'),
            'nomor_handphone' => '085733181815',
            'tgl_lahir' => now(),
            'jenis_kelamin' => 'L',
            'provinsi' => 'Jawa Timur',
            'kota' => 'Surabaya',
            'kecamatan' => 'Simokerto',
            'role_id' => 3,
        ]);

        Pelanggan::create([
            'pelanggan_id' => $pelanggan->id,
            'point' => 0,
        ]);

        $admin = User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'nomor_handphone' => '085733181816',
            'tgl_lahir' => now(),
            'jenis_kelamin' => 'L',
            'provinsi' => 'Jawa Timur',
            'kota' => 'Surabaya',
            'kecamatan' => 'Simokerto',
            'role_id' => 2,
        ]);

        Admin::create([
            'admin_id' => $admin->id,
            'alamat' => 'Sidodadi baru 12'
        ]);

        $owner = User::create([
            'nama' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner123'),
            'nomor_handphone' => '085733181817',
            'tgl_lahir' => now(),
            'jenis_kelamin' => 'L',
            'provinsi' => 'Jawa Timur',
            'kota' => 'Surabaya',
            'kecamatan' => 'Simokerto',
            'role_id' => 1,
        ]);

        Admin::create([
            'admin_id' => $owner->id,
            'alamat' => 'Jalan Owner 12 Surabaya'
        ]);
    }
}
