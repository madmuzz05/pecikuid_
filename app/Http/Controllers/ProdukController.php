<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Brand;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sql = 'SELECT brand.*, produk.* FROM produk LEFT JOIN brand ON produk.brand_id = brand.id_brand WHERE produk.brand_id = ?';
        // $sql = 'SELECT * FROM brand ';
        $data = DB::select($sql, [Auth::user()->brand_id]);
        // $data = DB::select($sql);
        if ($request->ajax()) {
            $ajax = Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row)
            {
                $btn = '<a href="/produk/detail/'.$row->id_produk.'" class="btn btn-sm btn-tone btn-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="anticon anticon-profile"></i> Detail</a>
                <a href="/produk/edit/'.$row->id_produk.'"class="btn btn-sm btn-tone btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="anticon anticon-edit"></i> Edit</a>
                <button type="button" class="btn btn-sm btn-tone btn-danger" data-toggle="modal" data-target="#delete'.$row->id_produk.'"><i data-toggle="tooltip" data-placement="top" title="Hapus" class="anticon anticon-delete"></i> Delete</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            return $ajax; 
            // return response()->json(['data' => $data]);
        }
        return view('admin/produk/index', compact('data'));
    }
    public function getProduk()
    {
        $sql = 'SELECT brand.*, produk.* FROM produk LEFT JOIN brand ON produk.brand_id = brand.id_brand WHERE produk.brand_id = ?';
        $data = DB::select($sql, [Auth::user()->brand_id]);
        return response()->json(['data' => $data]);
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
    function generateBarcodeNumber() {
        $number = mt_rand(1, 999); // better than rand()
    
        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
    }
    
    function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Produk::where('kode_produk',$number)->exists();
    }

    function jenisProduk($jenis) {
        if ($jenis === 'Polos') {
            return 'PLS';
        } else if ($jenis === 'Bordir') {
            return 'BDR';
        } else if ($jenis === 'Soga') {
            return 'SGA';
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);


        $kode = $this->jenisProduk($request->jenis_produk).'-'.sprintf("%03s",$this->generateBarcodeNumber());
        
        $produk = Produk::create([
            'foto' => $nama_file,
            'nama_produk' => $request->nama_produk,
            'kode_produk' => $kode,
            'jenis_produk' => $request->jenis_produk,
            'nomor' => $request->nomor,
            'tinggi' => $request->tinggi,
            'unit' => $request->unit,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'brand_id' => $request->brand,
        ]);
        // dd($produk);
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        $sql='SELECT brand.*, produk.* FROM produk LEFT JOIN brand ON produk.brand_id = brand.id_brand WHERE produk.brand_id = ? AND produk.id_produk = ?';
        $data = DB::select($sql, [Auth::user()->brand_id, $id]);
        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sql='SELECT brand.*, produk.* FROM produk LEFT JOIN brand ON produk.brand_id = brand.id_brand WHERE produk.brand_id = ? AND produk.id_produk = ?';
        $data = DB::select($sql, [Auth::user()->brand_id, $id]);
        return view('admin.produk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file = $request->file('foto');
        if ($file) {
            $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'images';
            $file->move($tujuan_upload,$nama_file);
            Produk::where('id_produk', $request->id)->update([
                'foto' => $nama_file,
            ]);
            }

        if ($request->jenis_produk !== $request->jenis) {
            $kode = $this->jenisProduk($request->jenis_produk).'-'.sprintf("%03s",$this->generateBarcodeNumber());
            $produk = Produk::where('id_produk', $request->id)->update([
                'kode_produk' => $kode
            ]);
        }
        
        $produk = Produk::where('id_produk', $request->id)->update([
            'nama_produk' => $request->nama_produk,
            'jenis_produk' => $request->jenis_produk,
            'nomor' => $request->nomor,
            'tinggi' => $request->tinggi,
            'unit' => $request->unit,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'brand_id' => Auth::user()->brand_id,
        ]);
        // dd($produk);
        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('/produk');
    }
}
