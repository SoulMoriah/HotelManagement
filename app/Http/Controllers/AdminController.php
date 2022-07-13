<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
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

    function dashboard()
    {
        $bookings=Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        // for chart area
        $labels=[];
        $data=[];
        foreach($bookings as $booking){
            $labels[]=$booking['checkin_date'];
            $data[]=$booking['total_bookings'];
        }

        //for Pie chart
        $rtbookings=DB::table('room_types as rt')
            ->join('rooms as r','r.room_type_id','=','rt.id')
            ->join('bookings as b','b.room_id','=','r.id')
            ->select('rt.*','r.*','b.*',DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.room_type_id')
            ->get();
        $plabels=[];
        $pdata=[];
        foreach($rtbookings as $rtbooking){
            $plabels[]=$rtbooking->detail;
            $pdata[]=$rtbooking->total_bookings;
        }
        //echo '<pres>';
        //print_r($rtbookings);

        return view('dashboard',['labels'=>$labels,'data'=>$data,'plabels'=>$plabels,'pdata'=>$pdata]);
    }
}
