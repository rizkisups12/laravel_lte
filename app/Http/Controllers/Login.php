<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel;
use Session;

class Login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request){
	    $usersModel = new UsersModel;
		$username = $request->username;
	    $password = $request->password;
	    $user = $usersModel->where('username', $username)->first();   
        $pw = $user['password']; 

	    if(empty($user)){
	    	return redirect()->route('login.index');
	    }
	    if($user['password']!=$password){
	    	return redirect()->route('login.index');
	    }
        if ($user['departemen'] == 'Maintenance') {
            session()->set('departemen',$user['departemen']);
            return redirect()->route('master.index');
        } elseif ($user['departemen'] == 'Produksi') {
            session()->set('departemen',$user['departemen']);
            return redirect()->route('master.index');
		} elseif ($user['departemen'] == 'Procurement') {
            session()->set('departemen',$user['departemen']);
            return redirect()->route('master.index');
        } else {
            session()->set('departemen',$user['departemen']);
            return redirect()->route('login.index');
        }

	    session()->set('departemen',$user['departemen']);
	    return redirect()->route('master.index');
	}
    
	public function logout(){
		session()->remove('departemen');
		return redirect()->route('login.index');
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
