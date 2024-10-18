<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminPage(Request $request){

        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('dashboard');
            }else if($usertype == 'admin'){
                return  view('admin.dashboard');
            }else{
                return redirect('/');
                //return redirect()->back();
            }

        }



        
    }
}

