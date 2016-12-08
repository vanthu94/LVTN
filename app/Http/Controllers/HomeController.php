<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function getHome () {
    	if (!Auth::check()) {
            return view('home');
        } 
        else if(Auth::user()->level ==1){
            return redirect('qho_admin');
        }
        else if(Auth::user()->level ==2){
            return redirect('qho_sinhvien');
        } else{
            return redirect('qho_giaovien');
        }
    }

}
