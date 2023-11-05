<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\KurirSeeder;
use Database\Seeders\ProdukSeeder;

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
        $this->call(ProdukSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(KurirSeeder::class);
    }
}
