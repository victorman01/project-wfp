<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Kategori::create([
            'nama' => 'Alat Rumah Tangga'
        ]);
        
        Kategori::create([
            'nama' => 'Alat Mandi'
        ]);
        
        Kategori::create([
            'nama' => 'Alat Tidur'
        ]);

        Produk::all()->each(function($produk){
            $produk->kategori_produk()->attach(1);
        });
    }
}
