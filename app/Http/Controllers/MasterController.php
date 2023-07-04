<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;


class MasterController extends Controller
{
    public function index(){
        if(!session()->has('departemen')){
			return redirect()->to('/login');
		}
		$akses = session()->get('departemen');
        return view('index',compact('akses'));
    }

    public function index_user(){
        $data = DB::table("pengguna")
        ->select("*")
        ->get();
        if(!session()->has('departemen')){
			return redirect()->to('/login');
		}
		$akses = session()->get('departemen');
        // dd($data);
        return view('pengguna.index_user',compact('data','akses'));
    }

    public function edit($id)
    {
        $get = DB::table('pengguna')->where('id_pengguna', $id)->first();
        if(!session()->has('departemen')){
			return redirect()->to('/login');
		}
		$akses = session()->get('departemen');
        return view('pengguna.edit_user',compact('get','akses'));
    }

    public function store(Request $request){
        try {
            // dd($request->all());
            DB::beginTransaction();
            DB::table("pengguna")
            ->insert([
                'id_pengguna'=>$request->id_pengguna,
                'nama_anggota'=>$request->nama_anggota,
                'departemen'=>$request->departemen,
                'username'=>$request->username,
                'password'=>$request->password,
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('master.index_user', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('master.index_user');
        }
    }

    public function update(Request $request){
        try {
            DB::beginTransaction();
            DB::table("pengguna")
            ->where('id_pengguna',$request->id_pengguna)
            ->update([
                'nama_anggota'=>$request->nama_anggota,
                'departemen'=>$request->departemen,
                'username'=>$request->username,
                'password'=>$request->password,
            ]);
            
            DB::commit();
            Session::flash('sukses','Data berhasil disimpan');
            return redirect()->route('master.index_user', 'pesan');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('master.index_user');
        }
    }

    public function delete($id){
        DB::table("pengguna")
        ->where("id_pengguna", $id)
        ->delete();
        Session::flash('gagal','Data berhasil dihapus');
        return redirect()->route('master.index_user','pesan');
    }

    public function destroy($id)
    {
    DB::table('pengguna')->where('id_pengguna', $id)->delete();
    Session::flash('gagal','Data berhasil dihapus');
    return redirect()->route('master.index_user','pesan');
    }
}