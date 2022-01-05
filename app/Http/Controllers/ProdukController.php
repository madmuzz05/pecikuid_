<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukImage;
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
        $sql = 'SELECT brand.*, produk.* FROM produk LEFT JOIN brand ON produk.brand_id = brand.id_brand WHERE produk.brand_id = ? order by produk.id_produk desc';
        // $sql = 'SELECT * FROM brand ';
        $data = DB::select($sql, [Auth::user()->brand_id]);
        // $data = DB::select($sql);
        if ($request->ajax()) {
            $ajax = Datatables::of($data)
            ->addIndexColumn()
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
        // $request->validate([
        //     'foto' => ['required', 'string', 'max:255'],
        //     'nama_produk' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'jenis_kelamin' => ['required'],
        //     'alamat' => ['required', 'string', 'max:255'],
        //     'telepon' => ['required', 'numeric'],
            
        // ]);
        $file1 = $request->file('foto');
        $nama_file = time()."_".$file1->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';
        $file1->move($tujuan_upload,$nama_file);


        $kode = $this->jenisProduk($request->jenis_produk).'-'.sprintf("%03s",$this->generateBarcodeNumber());
        
        $produk = new Produk;
            $produk->foto = $nama_file;
            $produk->nama_produk = $request->nama_produk;
            $produk->kode_produk = $kode;
            $produk->jenis_produk = $request->jenis_produk;
            $produk->nomor = $request->nomor;
            $produk->tinggi = $request->tinggi;
            $produk->unit = $request->unit;
            $produk->harga = $request->harga;
            $produk->deskripsi = $request->deskripsi;
            $produk->brand_id = $request->brand;
            $produk->jenis_penjualan = $request->jenis_penjualan;
            $produk->save();
            
        if ($request->hasfile('foto_lain')) 
        {
            foreach ($request->file('foto_lain') as $file2) 
            {
                $name = time()."_".$file2->getClientOriginalName();
                $tujuan_upload = 'images';
                $file2->move($tujuan_upload,$name); 
                ProdukImage::create([
                    'foto' => $name,
                    'produk_id' => $produk->id_produk,
                ]);
            }
        }

        // dd($produk);
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $sql='SELECT brand.*, produk.* FROM produk LEFT JOIN brand ON produk.brand_id = brand.id_brand WHERE produk.brand_id = ? AND produk.id_produk = ?';
        $data = DB::select($sql, [Auth::user()->brand_id, $id]);

        $sql2='SELECT product_images.* FROM produk 
        LEFT JOIN brand ON produk.brand_id = brand.id_brand 
        LEFT JOIN product_images ON produk.id_produk = product_images.produk_id 
        WHERE produk.brand_id = ? AND produk.id_produk = ?';
        $data2 = DB::select($sql2, [Auth::user()->brand_id, $id]);
        // dd($data);
        if ($request->ajax()) {
            return response()->json(['data' => $data]);
        }
        return view('admin.produk.detail', compact('data','data2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $sql='SELECT brand.*, produk.* FROM produk 
        LEFT JOIN brand ON produk.brand_id = brand.id_brand 
        WHERE produk.brand_id = ? AND produk.id_produk = ?';
        $data = DB::select($sql, [Auth::user()->brand_id, $id]);

        $sql2='SELECT product_images.*, produk.id_produk as id_produk FROM produk 
        LEFT JOIN brand ON produk.brand_id = brand.id_brand
        LEFT JOIN product_images ON produk.id_produk = product_images.produk_id 
        WHERE produk.brand_id = ? AND produk.id_produk = ?';
            $data2 = DB::select($sql2, [Auth::user()->brand_id, $id]);
        if ($request->ajax()) {
            if ($data2 != null) {
                return response()->json([
                    'data2' => $data2,
                    'status'=>200,
            ]);
            }else {
                return response()->json([
                    'status'=>404,
            ]);
            }
        }
// dd($data2);
        return view('admin.produk.edit', compact('data','data2'));
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
        if ($request->hasfile('filenames')) 
        {
            foreach ($request->file('filenames') as $file2) 
            {
                $name = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'images';
                $file2->move($tujuan_upload,$name); 
                $produk = ProdukImage::where('id_produk', $request->id)->update([
                    'foto_lain' => json_encode($data),
                ]);
            }
        }
        
        $produk = Produk::where('id_produk', $request->id)->update([
            'nama_produk' => $request->nama_produk,
            'jenis_produk' => $request->jenis_produk,
            'nomor' => $request->nomor,
            'tinggi' => $request->tinggi,
            'unit' => $request->unit,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'jenis_penjualan' => $request->jenis_penjualan,
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
        ProdukImage::where('produk_id',$id)->delete();
        Produk::destroy($id);
        return redirect('/produk');
    }
}
