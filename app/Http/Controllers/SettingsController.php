<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function profile()
    {
    	return view('settings.profile');
    }
    public function editProfile()
    {
    	return view('settings.edit-profile');
    }
    public function updateProfile(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'name'=>'required',
    		'npp'=>'required|unique:users,npp,'.$user->id
    	]);

    	$user->name=$request->get('name');
    	$user->npp=$request->get('npp');
    	$user->save();
    	Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Profil Berhasil Diubah"]);
        return redirect('settings/profile');
    }
    public function editPassword()
    {
    	return view('settings.edit-password');
    }
    public function updatePassword(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password'=>'required|passcheck:'.$user->password,
    		'new_password'=>'required|confirmed|min:6',
    	],
    	[
    		'password.passcheck'=>'Password Lama Tidak Sesuai'
    	]);

    	$user->password=bcrypt($request->get('new_password'));
    	$user->save();
    	Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Password Berhasil Diubah"]);
        return redirect('settings/password');
    }
}
