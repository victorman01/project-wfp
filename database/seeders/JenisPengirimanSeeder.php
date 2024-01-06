<?php

namespace Database\Seeders;

use App\Models\JenisPengiriman;
use Illuminate\Database\Seeder;

class JenisPengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPengiriman::create([
            'nama' => 'Same Day',
            'harga' => 50000,
            'lama_pengiriman' => "2-3 jam",
            'kurir_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        JenisPengiriman::create([
            'nama' => 'Reguler',
            'harga' => 30000,
            'lama_pengiriman' => "2-3 hari",
            'kurir_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        JenisPengiriman::create([
            'nama' => 'Classic',
            'harga' => 10000,
            'lama_pengiriman' => "4-5 hari",
            'kurir_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        JenisPengiriman::create([
            'nama' => 'Same Day-2',
            'harga' => 50000,
            'lama_pengiriman' => "2-3 jam",
            'kurir_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        JenisPengiriman::create([
            'nama' => 'Reguler-2',
            'harga' => 30000,
            'lama_pengiriman' => "2-3 hari",
            'kurir_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        JenisPengiriman::create([
            'nama' => 'Classic-2',
            'harga' => 10000,
            'lama_pengiriman' => "4-5 hari",
            'kurir_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
