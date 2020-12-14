<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customermodel;
use App\Models\Cuisinemodel;
use Illuminate\Support\Facades\DB;

class RestaurantCon extends Controller
{
	// protected $namespace='App\Http\Controllers';
    public function index()
    {
    	return view('restaurant_portal');
    }
    public function registration()
    {
    	return view('reg_type');
    }
    public function restaurant_owner(Request $req)
    {
    	$data=Cuisinemodel::select('cuisine')->get();
    	return view('reg_type',['data'=>$data]);
    	//$cuisine=$req->cuisine;
                    
    }
    public function res_reg(Request $req)
    {
    	$req->validate([
    		'image'=> 'required',
    		'name'=> 'required',
    		'address'=> 'required',
    		'about'=> 'required',
    		'cuisine'=> 'required'
    	]);
    	$registration= new Customermodel();
    	
        $registration->image =$req->file('image');
        $file=time().rand(123456,999999).'.'.$registration->image->extension();  
        $destination=public_path('/images'); 
        $registration->image->move($destination,$file);           
    	$registration->res_name=$req->input('name');
    	$registration->address=$req->input('add');
    	$registration->st_add=$req->input('st_add');
    	$registration->route=$req->input('route');
    	$registration->city=$req->input('city');
    	$registration->state=$req->input('state');
    	$registration->zip=$req->input('zip');
    	$registration->country=$req->input('country');
        $registration->about=$req->input('editor1');
        $registration->cuisine=implode(",",$req->input('cuisine'));
    	$registration->save();
    	$req->session()->flash('msg','You have successfully registered');
    	return redirect('registration');

    }


}
