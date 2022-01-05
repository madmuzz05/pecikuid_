<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProdukUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRetail()
    {
        $data1= DB::table('produk')
                ->leftjoin('brand', 'produk.brand_id', '=', 'brand.id_brand')
                ->where('produk.jenis_penjualan', 'Retail')->orderBy('id_produk', 'desc')->paginate(6);
        return view('user.produk.retail', compact('data1'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGrosir()
    {
        
        $data2= DB::table('produk')
                ->leftjoin('brand', 'produk.brand_id', '=', 'brand.id_brand')
                ->where('produk.jenis_penjualan', 'Grosir')->orderBy('id_produk', 'desc')->paginate(6);
        return view('user.produk.grosir', compact('data2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $sql1 = 'SELECT produk.*, brand.* FROM produk 
        LEFT JOIN brand ON produk.brand_id = brand.id_brand 
        WHERE produk.id_produk = ?';
        $data = DB::select($sql1, [$id]);

        $sql2 = 'SELECT product_images.* FROM product_images
        LEFT JOIN produk ON product_images.produk_id = produk.id_produk
        WHERE produk.id_produk = ?';
        $data2 = DB::select($sql2, [$id]);

        if ($request->ajax()) {
            return response()->json(['data2' => $data2]);
        }
        // dd($data2);
        return view('user.produk.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
