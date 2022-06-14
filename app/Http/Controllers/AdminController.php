<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Cookie;

class AdminController extends Controller
{
    //login
    function login(){
        return view('login');
    }

    //check login
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->count();
        if ($admin > 0) {
            $adminData=Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);

            if ($request->has('rememberme')) {
                Cookie::queue('adminuser',$request->username,2880);
                Cookie::queue('adminpwd',$request->password,2880);
            }

            return redirect('admin');
        }else {
            return redirect('admin/login')->with('msg','invalide username/password!!!');
        }
    }

    //logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
