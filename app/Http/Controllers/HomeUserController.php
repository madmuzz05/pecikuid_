<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Brand;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeUserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sql= 'SELECT brand.*, produk.* FROM produk LEFT JOIN brand ON produk.brand_id = brand.id_brand ORDER BY produk.id_produk DESC LIMIT 8';
        $produk = DB::select($sql);
        // DD($produk);
        return view('user.home', compact('produk'));
    }
}
