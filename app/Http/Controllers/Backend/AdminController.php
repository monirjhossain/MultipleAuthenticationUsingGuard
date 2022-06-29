<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminform(){
        return view('backend.admin.adminlogin');
    }

    public function adminlogin(Request $request){

        // dd($request);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('admin/dashboard');
        }else{
            Session::flash('error-msg','Invalid Email or Password!');
            return redirect()->back();
        }
    }

    public function adminlogout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
