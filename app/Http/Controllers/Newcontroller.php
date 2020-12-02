<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newmodel;

class Newcontroller extends Controller
{
	protected $namespace='App\Http\Controllers';
    function registration(Request $req)
    {
    	$registration= new Newmodel();
    	$registration->fname=$req->input('fname');
    	$registration->lname=$req->input('lname');
    	$registration->email=$req->input('email');
    	$registration->password=$req->input('password');
    	$registration->about=$req->input('about');
    	$registration->save();
    	return redirect('login');
    }
}
?>