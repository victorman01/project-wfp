<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\KurirSeeder;
use Database\Seeders\GambarSeeder;
use Database\Seeders\ProdukSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\JenisProdukSeeder;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\DiskonProdukSeeder;
use Database\Seeders\KategoriProdukSeeder;
use Database\Seeders\JenisPengirimanSeeder;
use Database\Seeders\AlamatPengirimanSeeder;
use Database\Seeders\MetodePembayaranSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(BrandSeeder::class);
        $this->call(KurirSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(JenisProdukSeeder::class);
        $this->call(DiskonProdukSeeder::class);
        $this->call(GambarSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KategoriProdukSeeder::class);
        $this->call(MetodePembayaranSeeder::class);
        $this->call(AlamatPengirimanSeeder::class);
        $this->call(JenisPengirimanSeeder::class);

        // // PROVINSI
        // $csvFile = url('csv\provinces.csv');
        // $csvData = array_map('str_getcsv', file($csvFile));

        // foreach ($csvData as $row) {
        //     DB::table('provinsis')->insert([
        //         'id' => $row[0],
        //         'nama' => $row[1],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // // KOTA
        // $csvFile = url('csv\regencies.csv');
        // $csvData = array_map('str_getcsv', file($csvFile));

        // foreach ($csvData as $row) {
        //     DB::table('kotas')->insert([
        //         'id' => $row[0],
        //         'provinsi_id' => $row[1],
        //         'nama' => $row[2],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // // KECAMATAN
        // $csvFile = url('csv\districts.csv');
        // $csvData = array_map('str_getcsv', file($csvFile));

        // foreach ($csvData as $row) {
        //     DB::table('kecamatans')->insert([
        //         'id' => $row[0],
        //         'kota_id' => $row[1],
        //         'nama' => $row[2],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // // KELURAHAN
        // $csvFile = url('csv\villages.csv');
        // $csvData = array_map('str_getcsv', file($csvFile));

        // foreach ($csvData as $row) {
        //     DB::table('kelurahans')->insert([
        //         'id' => $row[0],
        //         'kecamatan_id' => $row[1],
        //         'nama' => $row[2],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
