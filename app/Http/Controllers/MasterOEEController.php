<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class MasterOEEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('departemen')){
			return redirect()->to('/login');
		}
		$akses = session()->get('departemen');

        $data = DB::table("data_oee")
        ->select("*")
        ->get();

        $mesin = DB::table("mesin")
        ->select("*")
        ->get();

        $produk = DB::table("produk")
        ->select("*")
        ->get();
        // dd($data);
        return view('oee.index_oee',compact('data','mesin','produk','akses'));
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
            DB::table("data_oee")
            ->insert([
                'nomor_mesin'=>$request->nomor_mesin,
                'nama_produk'=>$request->nama_produk,
                'tanggal'=>$request->tanggal,
                'breakdown'=>$request->breakdown,
                'setup'=>$request->setup,
                'loading_time'=>$request->loading_time,
                'downtime'=>$request->downtime,
                'operating_time'=>$request->operating_time,
                'processed_amount'=>$request->processed_amount,
                'cycle_time'=>$request->cycle_time,
                'defect_amount'=>$request->defect_amount,
                'availability'=>$request->availability,
                'performance'=>$request->perfomance,
                'quality'=>$request->quality,
                'oee'=>$request->oee,
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('oee.index', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('oee.index');
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
    $data = DB::table('oee')->where('id', $id)->first();
    return view('oee.edit_oee',compact('get'));
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
            DB::beginTransaction();
            DB::table("data_oee")
            ->where('id', $request->id)
            ->update([
                'nomor_mesin'=>$request->nomor_mesin,
                'nama_produk'=>$request->nama_produk,
                'tanggal'=>$request->tanggal,
                'breakdown'=>$request->breakdown,
                'setup'=>$request->setup,
                'loading_time'=>$request->loading_time,
                'downtime'=>$request->downtime,
                'operating_time'=>$request->operating_time,
                'processed_amount'=>$request->processed_amount,
                'cycle_time'=>$request->cycle_time,
                'defect_amount'=>$request->defect_amount,
                'availability'=>$request->availability,
                'performance'=>$request->perfomance,
                'quality'=>$request->quality,
                'oee'=>$request->oee
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('oee.index', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('oee.index');
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
        DB::table('data_oee')->where('id', $id)->delete();
        Session::flash('gagal','Data berhasil dihapus');
        return redirect()->route('oee.index','pesan');
    }
}
