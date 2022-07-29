<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Costumer;
use App\Models\RoomType;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Booking::all();
        return view('booking.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Costumer::all();
        return view('booking.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'costumer_id'=>'required',
            'room_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adults'=>'required',

        ]);

        $data= new Booking;
        $data->costumer_id = $request->costumer_id;
        $data->room_id = $request->room_id;
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->total_adults = $request->total_adults;
        $data->total_children = $request->total_children;
        
        $data->save();
        return redirect()->back()->with('success','data added succeffuly');
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
        $data= Booking::find($id);
        $data -> delete();
        return redirect()->back()->with('success','data deleted succeffuly');
    }

    // chekin available rooms
    function available_rooms(Request $request, $checkin_date)
    {
        $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
        $data=[];
        foreach($arooms as $room){
            $roomTypes=RoomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }
        return response()->json(['data'=>$data]);
    }

    public function front_booking()
    {
        return view('front-booking');
    }
}
