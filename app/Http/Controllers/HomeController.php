<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\DetailTransaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home', [
            'produk' =>  Produk::inRandomOrder()->take(6)->get(),
            'display_produk' => Produk::take(4)->get(),
            'kategoris' => Kategori::all(),
            'brands' => Brand::all()
        ]);
    }
}
