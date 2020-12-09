<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signupmodel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendingEmail;

class Newcontroller extends Controller
{
	protected $namespace='App\Http\Controllers';
    function registration(Request $req)
    {
    	
    	$registration= new Newmodel();
    	$registration->fname=$req->input('fname');
    	$registration->lname=$req->input('lname');
    	$registration->email=$req->input('email');
    	$registration->password=md5($req->input('password'));
    	$registration->about=$req->input('about');
    	$registration->save();
        //$email=$req->email;
    	return redirect('loginuser');

        // $userid=Newmodel::select('id')->where('email',$req->email)->get();
        // $data = [
        //     'title' => 'Mail for customer support' ,
        //     'body' => 'Thanks to register.' ,
        //     'dataid' => $userid
        // ];

        

        // Mail::to('gitahazra25@gmail.com')->send(new SendingEmail($data));
        // return "Email Sent!";
    }
}
?>
