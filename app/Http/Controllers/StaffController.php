<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Staff;
use App\Models\StaffPayement;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::all();
        return view('staff.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departs=Departement::all();
        return view('staff.create',compact('departs'));
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
            'salary_type'=>'required',
            'salary_amt'=>'required',
            'departement_id'=>'required',
        ]);

        $data= new Staff;
        $data->full_name = $request->full_name;
        $data->departement_id = $request->departement_id;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amt = $request->salary_amt;
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
        $departs = Departement::all();
        $data = Staff::find($id);
        return view('staff.show',compact('data','departs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departs = Departement::all();
        $data = Staff::find($id);
        return view('staff.edit',compact('data','departs'));
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
        $data= Staff::find($id);
        $data->full_name = $request->full_name;
        $data->departement_id = $request->departement_id;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amt = $request->salary_amt;
        $data->save();

        if ($request->hasFile('photo')) {
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

        return redirect('admin/staff/'.$id.'/edit')->with('success','data updated succeffuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Staff::find($id);
        $data -> delete();
        return redirect()->back()->with('success','data deleted succeffuly');
    }

    //Add Payement
    function add_payement($staff_id)
    {
        $staff= Staff::find($staff_id);
        return view('staffpayement.create',['staff_id'=>$staff_id,'staff'=>$staff]);
    }

    function save_payement(Request $request, $staff_id)
    {
        $data= new StaffPayement();
        $data->staff_id = $staff_id;
        $data->amount = $request->amount;
        $data->payement_date = $request->amount_date;
        $data->save();
        return redirect()->back()->with('success','data added succeffuly');
    }

    //View All payement
    function all_payements(Request $request, $staff_id)
    {
        $data= StaffPayement::where('staff_id',$staff_id)->get();
        $staff= Staff::find($staff_id);
        return view('staffpayement.index',['staff_id'=>$staff_id,'data'=>$data,'staff'=>$staff]);
    }

    //delete payement
    public function delete_payement($id, $staff_id)
    {
        $data= StaffPayement::find($id);
        $data -> delete();
        return redirect()->back()->with('success','data deleted succeffuly');
    }

}
