<?php

namespace App\Http\Controllers;

use App\Models\Introcept;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $datas= Introcept::all();
        return view('frontend.index',compact('datas'));
    }

    public function store(Request $request){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone' => 'required|numeric',
            'gender' => 'required',

        ]);
        $data= new Introcept();
        $data->name= $request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;
        $data->gender= $request->gender;
        $data->reading= $request->reading?true:false;
        $data->travelling= $request->travelling?true:false;
        $data->music= $request->music?true:false;
        $data->save();
        return redirect()->back()->with('success','Data has been saved successfully!!');
    }
}
