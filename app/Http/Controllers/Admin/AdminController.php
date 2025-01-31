<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function formlogin(){
        return view('Admin.login');
    }
    public function login(Request $req){
        $email=Petugas::where('email',$req->email)->first();
        if(!$email){
            return redirect()->back()->with(['pesan'=>'Email tidak terdaftar!']);
        }
        $password=Hash::check($req->password,$email->password);
        if(!$password){
            return redirect()->back()->with(['pesan'=>'Password tidak sesuai']);
        }
        $auth=Auth::guard('admin')->attempt(['email'=>$req->email,'password'=>$req->password]);
        if($auth){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->back()->with(['pesan'=>'Akun tidak terdaftar!']);
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.formlogin');
    }
}
