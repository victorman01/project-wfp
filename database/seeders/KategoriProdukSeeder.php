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

        Kategori::create([
            'nama' => 'Alat Pembersih'
        ]);

        Kategori::create([
            'nama' => 'Alat Elektronik'
        ]);

        Produk::all()->each(function($produk){
            $produk->kategoriProduk()->attach(rand(1,5));
        });
    }
}
