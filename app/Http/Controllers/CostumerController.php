<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costumer;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Costumer::all();
        return view('costumer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costumer.create');
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
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',

        ]);

        $data= new Costumer;
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password = sha1($request->password);//sha1 encrypt the password
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        //$data->photo = $request ->file('photo')->store('public/imgs/');
        $photo = $request->file('photo');
        if ($photo) {
            $chemin="imgs";
            $photoname = time().'.'.$photo->getClientoriginalExtension();
            $photo->move($chemin,$photoname);
            $data ->photo = $photoname;
        }
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
        $data = Costumer::find($id);
        return view('costumer.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Costumer::find($id);
        return view('costumer.edit',compact('data'));
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
        $request ->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',

        ]);

        $data= Costumer::find($id);
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password = sha1($request->password);//sha1 encrypt the password
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        if ($request->hasFile('photo')) {
            //$data->photo = $request ->file('photo')->store('public/imgs');
            $photo = $request->file('photo');
            if ($photo) {
                $chemin="imgs";
                $photoname = time().'.'.$photo->getClientoriginalExtension();
                $photo->move($chemin,$photoname);
                $data ->photo = $photoname;
            }
        }else {
            $data->photo = $request ->prev_photo;
        }
        
        /*$photo = $request->photo;
        if ($photo) {
            $photoname = time().'.'.$photo->getClientoriginalExtension();
            $request->file->move('public/imgs',$photoname);
            $data ->photo = $photoname;
        }*/
        $data->save();
        return redirect('admin/costumer/'.$id.'/edit')->with('success','data updated succeffuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Costumer::find($id);
        $data -> delete();
        return redirect()->back()->with('success','data deleted succeffuly');
    }
}
