<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendingEmail;

class EmailCon extends Controller
{
    function emailsend()
    {
        return view('emailsend');
    }

    function send()
    {
    	$data = [
    		'title' => 'Mail for customer support' ,
    		'body' => 'Thanks to register.'
    	];
    	Mail::to('gitahazra25@gmail.com')->send(new SendingEmail($data));
    	return "Email Sent!";


        // $to_email="gitahazra25@gmail.com";
        // $to_name="gita";

    	// Mail::send('email_template',['data' => $data], function($message) use ($to_name, $to_email) {
     //       $message->to($to_email, $to_name);
     //       $message->bcc('tanmaysanyal.wgt@gmail.com');
     //       $message->subject('Reset Password');
     //       $message->from('tanmaysanyal.wgt@gmail.com','MiddleLayer');
     //    });
    }
}
