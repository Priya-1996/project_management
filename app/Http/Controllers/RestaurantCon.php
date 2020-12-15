<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customermodel;
use App\Models\Cuisinemodel;
use App\Models\Ownerdata;
use App\Models\Foodmodel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    	$registration= new Customermodel();
    	
        $name = time().rand(1,1000).'.'.$req->file('image')->extension();
        $req->file('image')->move(public_path('images'), $name);  
        $files= $name;
        $registration->image=$files;           
    	$registration->res_name=$req->input('name');
        $registration->email=$req->input('email');
        $registration->active=0;
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
    	$req->session()->flash('msg','Wait for the admin to activate your account');
    	return redirect('registration');

    }

    function active_owner(Request $req,$email)
    {
        $data = Ownerdata::create([
            'email'=>$email ,
            'ran_name'=>'owner'.Str::random(32) ,
            'ran_password' =>'code'.Str::random(32)
        ]);

        DB::table('restaurant_owner')->where('email',$email)->update(array('active'=>1));

        Mail::to('backlin@mymailcr.com')->send(new Ownermail($data));
        $req->session()->flash('msg1','Please login using this username and password');
        return redirect('registration');
    }

    function owner()
    {
        return view('ownerlogin');
    }

    function owner_dashboard()
    {
        return view('dash_owner');
    }

    function owner_login(Request $req)
    {
        $login=new Customermodel();
        $email=$req->email;
        $user=Customermodel::where('email',$email)->get();
        if(count($user)>0)
        {
            return redirect('ownerdashboard');
        }

    }

    function managefood()
    {
        return view('manage_food');
    }

    function addfood(Request $req)
    {
        $add=new Foodmodel();
        $add->name=$req->input('foodname');
        $add->price=$req->input('price');
        if($req->hasfile('image'))
        {
            foreach($req->file('image') as $file)
            {
                $image_name = time().rand(123456,999999).'.'.$file->extension();
                $file->move(public_path('images'), $image_name);  
                $files = $image_name; 
                DB::table('foodmanage')->insert(['name'=>$add->name , 'price'=>$add->price , 'image'=>$files]); 
                
            } 
            $req->session()->flash('msg2','Food details added');
                return redirect('/food');           
        }
        // else{
        //     echo "something wrong";
        // }
    }


}
