<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class MasterProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table("produk")
        ->select("*")
        ->get();
        // dd($data);
        return view('produk.index_produk',compact('data'));
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
        try {
            // dd($request->all());
            DB::beginTransaction();
            DB::table("produk")
            ->insert([
                'id_produk'=>$request->id_produk,
                'nama_produk'=>$request->nama_produk,
                'tipe_produk'=>$request->tipe_produk,
                'berat_produk'=>$request->berat_produk,
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('produk.index', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('produk.index');
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
        $data = DB::table("produk")
        ->select("*")
        ->where("id_produk", $id)
        ->first();
        return view('produk.edit_produk',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            // dd($request->all());
            DB::beginTransaction();
            DB::table("produk")
            ->where('id_produk',$request->id_produk)
            ->update([
                'nama_produk'=>$request->nama_produk,
                'tipe_produk'=>$request->tipe_produk,
                'berat_produk'=>$request->berat_produk,
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('produk.index', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('produk.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    DB::table('produk')->where('id_produk', $id)->delete();
    Session::flash('gagal','Data berhasil hapus');
    return redirect()->route('produk.index', 'pesan');
    }
}
