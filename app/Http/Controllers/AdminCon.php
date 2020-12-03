<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\Newmodel;

class AdminCon extends Controller
{
    protected $namespace='App\Http\Controllers';
    function login(Request $req)
    {
    	$login=new AdminModel();
    	$email=$req->email;
    	$password=$req->password;
    	$session=AdminModel::where('email',$email)->where('password',$password)->get();
    	if(count($session)>0)
    	{
    		$req->session()->put('id',$session[0]->id);
    		$user=$req->session()->put('user_mail',$session[0]->email);
    		return redirect('/dashboard')->with($user);
    	}
    	else{
    		echo "Invalid email or password";
    	}
    	
    }
    function datadelete($id)
    {
    	$data=Newmodel::find($id);
    	$data->delete();
    	return redirect()->back()->with('success','Successfully deleted');
    }
}
