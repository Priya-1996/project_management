<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\Newmodel;
use App\Models\Cuisinemodel;
use App\Models\Customermodel;
use Illuminate\Support\Facades\DB;
use DataTables;

class AdminCon extends Controller
{
    protected $namespace='App\Http\Controllers';
    function adminlogin()
    {
        return view('adminlogin');
    }

    function login(Request $req)
    {
    	$login=new AdminModel();
    	$email=$req->email;
    	$password=$req->password;
    	$session=AdminModel::where('email',$email)->where('password',$password)->get();
    	if(count($session)>0)
    	{
    		$req->session()->put('user_id',$session[0]->id);
    		$user=$req->session()->put('user_mail',$session[0]->email);
    		return redirect('/dashboard')->with($user);
    	}
    	else{
    		echo "Invalid email or password";
    	}
    	
    }
    function datadelete($id,Request $req)
    {
    	$data=Newmodel::find($id);
    	$data->delete();
    	$req->session()->flash('msg','Data deleted successfully');
    	return redirect('admindisplay');
    }
    function dataedit($id)
    {
    	$data=Newmodel::find($id)->toArray();
    	return view('edit_user',compact('data'));
    }
    function dataupdate(Request $req)
    {
    	$req->validate([
    		'fname'=> 'required',
    		'lname'=> 'required',
    		'email'=> 'required',
    		'password'=> 'required',
    		'about'=> 'required'
    	]);
    	$registration= Newmodel::find($req->userid);
    	$registration->fname=$req->input('fname');
    	$registration->lname=$req->input('lname');
    	$registration->password=md5($req->input('password'));
    	$registration->about=$req->input('about');
    	$registration->save();

    	return redirect('admindisplay');
    }
    function gettabledata()
    {
        // $data=Newmodel::select('*');
        // $data_arr=array();
        // foreach($data as $d)
        // {
        //     $id=$d->id;
        //     $fname=$d->fname;
        //     $lname=$d->lname;
        //     $email=$d->email;
        //     $password=$d->password;
        //     $about=$d->about;

        //     $data_arr[]=array(
        //         "id"=>$id,
        //         "fname"=>$fname,
        //         "lname"=>$lname,
        //         "email"=>$email,
        //         "password"=>$password,
        //         "about"=>$about
        //     );
        // }
        // $response=array(
        //     //"draw"=>intval($draw),
        //     //"itotalRecords"=>$totalRecords,
        //     "alldata"=>$data_arr
        // );
        // echo json_encode($response);
        // exit;

        
            $data = Newmodel::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<button><a href="'. url('/dataedit/'.$row->id) .'">Edit</a></button> <button><a href="'. url('/datadelete/'.$row->id) .'">Delete</a></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        

    }

    function dashboard()
    {
        return view('dashboard');
    }

    function cuisine()
    {
        return view('add_cuisine');
    }

    function addcuisine(Request $req)
    {
        $data = new Cuisinemodel;
        $data->cuisine=$req->input('cuisine');
        $data->save();
        $req->session()->flash('msg','Cuisine added successfully');
        return redirect('cuisine');
    }
    function modify_cuisine(Request $req)
    {
        $table=Cuisinemodel::select('*')->get();
        return view('modify_cuisine',['table'=>$table]);
    }

    // function disp_cuisine(Request $req)
    // {
    //     $cuisine=$req->cuisine;
    //     $data=Cuisinemodel::where('cuisine',$cuisine)->get();
    //     return redirect('restaurent_owner_reg',['data'=>$data]);
    // }

    function cuisinedelete($id,Request $req)
    {
        $data=Cuisinemodel::find($id);
        $data->delete();
        $req->session()->flash('msg','Cuisine deleted successfully');
        return redirect('modify');
    }

    function resowner_list()
    {
        return view('resownerlist');
    }

    


}
