<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;

class HomeController extends Controller
{
    //home page
    function home()
    {
        $roomTypes = RoomType::all();
        return view('home',compact('roomTypes'));
    }
}
