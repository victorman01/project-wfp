<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nama'=>'AgisSucida',
            'email'=>'agissucida@gmail.com',
            'tgl_lahir'=>now(),
            'password'=>bcrypt('password'),
            'jenis_kelamin'=>'L',
            'alamat'=>'Jl. in dulu aja',
        ]);
        Admin::create([
            'nama'=>'Victor Manuel',
            'email'=>'victorm@gmail.com',
            'tgl_lahir'=>now(),
            'password'=>bcrypt('password'),
            'jenis_kelamin'=>'L',
            'alamat'=>'Jl. in dulu aja',
        ]);
        Admin::create([
            'nama'=>'Rony Hartono',
            'email'=>'Ronyh@gmail.com',
            'tgl_lahir'=>now(),
            'password'=>bcrypt('password'),
            'jenis_kelamin'=>'L',
            'alamat'=>'Jl. in dulu aja',
        ]);
    }
}
