<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class NilaiOEEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $tanggal = null)
    {
        // dd();

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

        $oee = DB::table("data_oee")
        ->select("*")
        ->where('tanggal', base64_decode($tanggal))
        ->first();

        // dd($oee);
        return view('nilai.index_nilai',compact('data','mesin','produk','akses','tanggal','oee'));
    }

    public function oee_chart()
    {
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
        return view('nilai.oee_chart',compact('data','mesin','produk'));
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
        //
    }
}
