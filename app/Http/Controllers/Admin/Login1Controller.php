<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use DateTime,Auth;

class Login1Controller extends Controller
{
    public function getLogin () {
        if (!Auth::check()) {
            return view('admin.module.login.login');
        } 
        else if(Auth::user()->level ==1){
            return view('admin.master');
        }
        else if(Auth::user()->level ==2){
            return view('sinhvien.master');
        } else{
            return view('giaovien.master');
        }
    }

    public function getLogin1 () {
        
    }
    public function postLogin (LoginRequest $request) {
    	$admin = [
    		'username' => $request->txtUser, 
    		'password' => $request->txtPass, 
    		'level' => 1
    	];
        $sinhvien = [
            'username' => $request->txtUser, 
            'password' => $request->txtPass, 
            'level' => 2
        ];
        $giaovien = [
            'username' => $request->txtUser, 
            'password' => $request->txtPass, 
            'level' => 3
        ];

    	if (Auth::attempt($admin, true)) {
            return redirect('qho_admin');
        } 
        else if(Auth::attempt($sinhvien, true)){
            return redirect('qho_sinhvien');
        }
        else if(Auth::attempt($giaovien, true)){
            return redirect('qho_giaovien');
        } else {
        	return redirect()->back();
        }
        

    }

    public function getLogout () {

        Auth::logout();
        return redirect()->route('gethome');
    }
}
