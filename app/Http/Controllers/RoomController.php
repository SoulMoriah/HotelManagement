<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('room.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtypes=RoomType::all();
        return view('room.create',compact('roomtypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Room;
        $data->title = $request->title;
        $data->room_type_id = $request->room_type_id;
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
        $roomtypes = RoomType::all();
        $data = Room::find($id);
        return view('room.show',compact('data','roomtypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtypes=RoomType::all();
        $data = Room::find($id);
        return view('room.edit',compact('data','roomtypes'));
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
        $data= Room::find($id);
        $data->title = $request->title;
        $data->room_type_id = $request->room_type_id;
        $data->save();
        return redirect('admin/room/'.$id.'/edit')->with('success','data updated succeffuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Room::find($id);
        $data -> delete();
        return redirect()->back()->with('success','data deleted succeffuly');
    }
}
