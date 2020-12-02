<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newmodel;
use Illuminate\Support\Facades\DB;

class Logincontroller extends Controller
{
    protected $namespace='App\Http\Controllers';
    function login(Request $req)
    {
    	// $req->validate([
    	// 	'email'=> 'required',
    	// 	'password'=> 'required',
    	// ]);
    	$login=new Newmodel();
    	$email=$req->email;
    	$password=$req->password;
    	$session=Newmodel::where('email',$email)->where('password',$password)->get();
    	if(count($session)>0)
    	{
    		$req->session()->put('user_id',$session[0]->id);
    		$user=$req->session()->put('user_mail',$session[0]->email);
    		return redirect('/display')->with($user);
    	}
    	else{
    		echo "Invalid email or password";
    	}
    	
    }
}
