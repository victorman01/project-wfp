<?php

namespace Database\Seeders;

use App\Models\Gambar;
use Illuminate\Database\Seeder;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gambar::create([
            'nama'=>'Pompa Air 1',
            'path'=>'pompa_air_1.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Pompa Air 2',
            'path'=>'pompa_air_2.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Pompa Air 3',
            'path'=>'pompa_air_3.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Pompa Air 4',
            'path'=>'pompa_air_4.jpg',
            'produk_id'=>1
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 1',
            'path'=>'rak_besi_1.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 2',
            'path'=>'rak_besi_2.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 3',
            'path'=>'rak_besi_3.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Rak Besi 4',
            'path'=>'rak_besi_4.jpg',
            'produk_id'=>2
        ]);
        Gambar::create([
            'nama'=>'Brankas 1',
            'path'=>'brankas_1.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Brankas 2',
            'path'=>'brankas_2.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Brankas 3',
            'path'=>'brankas_3.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Brankas 4',
            'path'=>'brankas_4.jpg',
            'produk_id'=>3
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 1',
            'path'=>'drip_coffee_1.jpg',
            'produk_id'=>4
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 2',
            'path'=>'drip_coffee_2.jpg',
            'produk_id'=>4
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 3',
            'path'=>'drip_coffee_3.jpg',
            'produk_id'=>4
        ]);
        Gambar::create([
            'nama'=>'Drip Coffee 4',
            'path'=>'drip_coffee_4.jpg',
            'produk_id'=>4
        ]);
        Gambar::create([
            'nama'=>'Panci Shabu 1',
            'path'=>'panci_1.jpg',
            'produk_id'=>5
        ]);
        Gambar::create([
            'nama'=>'Panci Shabu 2',
            'path'=>'panci_2.jpg',
            'produk_id'=>5
        ]);
        Gambar::create([
            'nama'=>'Panci Shabu 3',
            'path'=>'panci_3.jpg',
            'produk_id'=>5
        ]);
        Gambar::create([
            'nama'=>'Panci Shabu 4',
            'path'=>'panci_4.jpg',
            'produk_id'=>5
        ]);
        Gambar::create([
            'nama'=>'Jas Hujan 1',
            'path'=>'jas_hujan_1.jpg',
            'produk_id'=>6
        ]);        
        Gambar::create([
            'nama'=>'Jas Hujan 2',
            'path'=>'jas_hujan_2.jpg',
            'produk_id'=>6
        ]);        
        Gambar::create([
            'nama'=>'Jas Hujan 3',
            'path'=>'jas_hujan_3.jpg',
            'produk_id'=>6
        ]);        
        Gambar::create([
            'nama'=>'Jas Hujan 4',
            'path'=>'jas_hujan_4.jpg',
            'produk_id'=>6
        ]); 
        Gambar::create([
            'nama'=>'Lampu 1',
            'path'=>'lampu_1.jpg',
            'produk_id'=>7
        ]);  
        Gambar::create([
            'nama'=>'Lampu 2',
            'path'=>'lampu_2.jpg',
            'produk_id'=>7
        ]);     
        Gambar::create([
            'nama'=>'Jerapah 1',
            'path'=>'jerapah_1.jpg',
            'produk_id'=>8
        ]);  
        Gambar::create([
            'nama'=>'Jerapah 2',
            'path'=>'jerapah_2.jpg',
            'produk_id'=>8
        ]);   
        Gambar::create([
            'nama'=>'Jerapah 3',
            'path'=>'jerapah_3.jpg',
            'produk_id'=>8
        ]);    
        Gambar::create([
            'nama'=>'Treadmil 3',
            'path'=>'treadmil_3.png',
            'produk_id'=>9
        ]);    
        Gambar::create([
            'nama'=>'Treadmil 2',
            'path'=>'treadmil_2.png',
            'produk_id'=>9
        ]);    
        Gambar::create([
            'nama'=>'Treadmil 1',
            'path'=>'treadmil_1.png',
            'produk_id'=>9
        ]);          
    }
}
