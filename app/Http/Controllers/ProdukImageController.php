<?php

namespace App\Http\Controllers;

use App\Models\ProdukImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'foto_lain'=> 'required',
            'produk_id'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
        if ($request->hasfile('foto_lain')) 
        {
            foreach ($request->file('foto_lain') as $file2) 
            {
                $name = time()."_".$file2->getClientOriginalName();
                $tujuan_upload = 'images';
                $file2->move($tujuan_upload,$name); 
                ProdukImage::create([
                    'foto' => $name,
                    'produk_id' => $request->input('produk_id'),
                ]);
            }
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $image=ProdukImage::destroy($id);
        return response()->json([
            'status'=>200,
            'message'=>'Student Deleted Successfully.'
        ]);
        
    }
}
