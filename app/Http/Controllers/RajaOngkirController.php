<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class RajaOngkirController extends Controller
{
    public function getProvinsi()
    {
        $get_provinsi = RajaOngkir::provinsi()->all();
        // dd($get_kota);
        return response()->json(compact('get_provinsi'));
    }
    public function getKota()
    {
        $get_kota = RajaOngkir::kota()->all();
        // dd($get_kota);
        return response()->json([
            'success'=> 'oke',
            'data'=> $get_kota
    ]);
    }
    public function cekOngkir(Request $request)
    {
        $ongkir = RajaOngkir::ongkosKirim([
            'origin' => 133,
            'destination'   => $request->idkota,      // ID kota/kabupaten tujuan
            'weight'        => 1300,    // berat barang dalam gram
            'courier'       => 'jne'
        ])->get();
        return response()->json([
            'success' => "oke",
            'ongkir' => $ongkir
        ]);
    }
}
