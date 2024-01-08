<?php

namespace Database\Seeders;

use App\Models\AlamatPengiriman;
use Illuminate\Database\Seeder;

class AlamatPengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlamatPengiriman::create([
            'nama' => 'Kantor',
            'alamat' => 'Sidodadi',
            'nama_penerima' => 'Rony',
            'nomor_handphone' => '085733181815',
            'provinsi' => 'Jawa Timur',
            'kota' => 'Malang',
            'kecamatan' => 'Simokerto',
            'kelurahan' => 'Sidodadi',
            'alamat_utama' => 1,
            'user_id' => 1
        ]);

        AlamatPengiriman::create([
            'nama' => 'Rumah',
            'alamat' => 'Sidodadi',
            'nama_penerima' => 'Alvin',
            'nomor_handphone' => '085733181815',
            'provinsi' => 'Jawa Timur',
            'kota' => 'Malang',
            'kecamatan' => 'Simokerto',
            'kelurahan' => 'Sidodadi',
            'alamat_utama' => 0,
            'user_id' => 1
        ]);
    }
}
