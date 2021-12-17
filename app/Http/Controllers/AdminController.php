<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sql = 'SELECT users.*, brand.nama_brand FROM users LEFT JOIN brand ON users.brand_id = brand.id_brand WHERE users.is_admin="admin" and users.brand_id  IN (SELECT id_brand FROM brand WHERE owner_id = ?)';
        $sql = 'SELECT users.*, brand.nama_brand FROM users LEFT JOIN brand ON users.brand_id = brand.id_brand WHERE users.is_admin = "admin" and users.brand_id = ?';
        $data = DB::Select($sql, [Auth::user()->brand_id]);
        // dd($data);
        return view('admin.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }
    public function getBrand(){
        $sql = 'SELECT brand.nama_brand, brand.id_brand FROM users LEFT JOIN brand ON users.id = brand.owner_id WHERE users.id = ?';
        $data = DB::Select($sql, [Auth::user()->id]);
        // $data = Brand::all();
        return response()->json(['data' => $data]);
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
            'jenis_kelamin' => ['required'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'numeric'],
            
        ]);

	$file = $request->file('foto');
 
	$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
	$tujuan_upload = 'images';
	$file->move($tujuan_upload,$nama_file);

        $user = User::Create([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'brand_id' => $request->brand,
            'is_admin' => 'admin',
            'foto' => $nama_file,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);
        // dd($user);
        // return redirect('/admin');
        if (!$user) {
            return redirect('/admin/create');
        } else {
            return redirect('/admin');
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sql = 'SELECT users.*, brand.* FROM users LEFT JOIN brand ON users.brand_id = brand.id_brand WHERE users.id = ?';
        $data = DB::select($sql, [$id]);
        // dd($data);
        return view('admin.admin.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sql = 'SELECT users.*, brand.* FROM users LEFT JOIN brand ON users.brand_id = brand.id_brand WHERE users.id = ?';
        $data = DB::select($sql, [$id]);
        // dd($data);
        return view('admin.admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
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
        if ($request->is_admin == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/admin/home');
        }
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
        if ($request->is_admin == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/admin/home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin');

    }
}
