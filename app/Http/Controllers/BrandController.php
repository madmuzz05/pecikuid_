<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sql = 'SELECT users.*, brand.* FROM users LEFT JOIN brand ON users.brand_id = brand.id_brand WHERE users.id = ?';
        $data = DB::select($sql, [$id]);
        // dd($data);
        return view('admin/brand/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'brand' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required'],
        ]);

        $data = $request->all();
        $brand= new Brand;
        $brand->nama_brand = $request->brand;
        // $brand->alamat = $request->alamat;
        // $brand->telepon = $request->telepon;
        $save = $brand->save();
        if ($save) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'is_admin' => 'owner',
                'brand_id' => $brand->id,
                'jenis_kelamin' => $data['jenis_kelamin'],
                'password' => Hash::make($data['password']),
                'alamat' => $request->alamat,
                'telepon' => $request->telepon
            ]);
        }
        
        return redirect('/login');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file = $request->file('foto');
        // dd($file);
        if ($file) {
        $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);
        User::where('id', $request->id)->update([
            'foto' => $nama_file,
        ]);
        }

        $user = User::where('id', $request->id)->update([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'brand_id' => $request->brand,
            'is_admin' => $request->is_admin,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        Brand::where('id_brand', $request->brand)->update([
            'nama_brand' => $request->namaBrand
        ]);
        // dd($user);
        return redirect()->back();
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['same:new_password']
        ]);
        if (!Hash::check($request->old_password, $request->password)) {
            return back()->withErrors(['old_password'=>'password not match']);
        }
        $user=User::find($request->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
    public function Kehidupan()
    {
        
    }
}
