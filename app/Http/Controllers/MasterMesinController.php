<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

class MasterMesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(!session()->has('departemen')){
			return redirect()->to('/login');
		}
		$akses = session()->get('departemen');

        $data = DB::table("mesin")
        ->select("*")
        ->get();
        
        // dd($data);
        return view('mesin.index_mesin',compact('data','akses'));
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
    public function store(Request $request){
        try {
            // dd($request->all());
            DB::beginTransaction();
            DB::table("mesin")
            ->insert([
                'id_mesin'=>$request->id_mesin,
                'nama_mesin'=>$request->nama_mesin,
                'tipe_mesin'=>$request->tipe_mesin,
                'kapasitas'=>$request->kapasitas,
                'berat_mesin'=>$request->berat_mesin,
                'tahun'=>$request->tahun,
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('mesin.index', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('mesin.index');
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
        // $data = DB::table("mesin")
        // ->select("*")
        // ->where("id_mesin", $id)
        // ->get();
        $data=DB::connection('mysql')
        ->table(DB::raw("(select * from mesin where id_mesin='$no_sj')v"))
        ->first();
        return view('mesin.edit_mesin',compact('data'));
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
            DB::table("mesin")
            ->where('id_mesin',$request->id_mesin)
            ->update([
                'nama_mesin'=>$request->nama_mesin,
                'tipe_mesin'=>$request->tipe_mesin,
                'kapasitas'=>$request->kapasitas,
                'berat_mesin'=>$request->berat_mesin,
                'tahun'=>$request->tahun,
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('mesin.index', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('mesin.index');
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
        DB::table('mesin')->where('id_mesin', $id)->delete();
        Session::flash('gagal','Data berhasil dihapus');
        return redirect()->route('mesin.index','pesan');
    }
}
