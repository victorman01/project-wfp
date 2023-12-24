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
use Database\Seeders\DiskonProdukSeeder;
use Database\Seeders\JenisProdukSeeder;

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
    }
}
