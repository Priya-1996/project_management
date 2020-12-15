<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signupmodel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendingEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
	protected $namespace='App\Http\Controllers';
    function index()
    {
        return view('user_registration');
    }
    function registration(Request $req)
    {
    	
    	$registration= new Signupmodel();
    	$registration->fname=$req->input('fname');
    	$registration->lname=$req->input('lname');
    	$registration->email=$req->input('email');
        $registration->active=0;
        $registration->email_verification_code=Str::random(32);
    	$registration->password=md5($req->input('password'));
    	$registration->about=$req->input('about');
        $registration->latitude=$req->input('latitude');
        $registration->longitude=$req->input('longitude');
    	$registration->save();
        //$email=$req->email;
        //echo "data saved";
    	//return redirect('userlogin');

        // $userid=Newmodel::select('id')->where('email',$req->email)->get();
        $data = [
            'title' => 'Mail for customer support' ,
            'body' => 'Thanks to register.' ,
            'email_verification_code'=>$registration->email_verification_code
        ];

        

        Mail::to('priyahaz444@gmail.com')->send(new SendingEmail($data));
        $req->session()->flash('msg1','Please check your email to activate your account');
        return redirect('/registration');
        
    }
    public function verifyEmail($token,Request $req)
    {
        DB::table('user_registration')->where('email_verification_code',$token)->update(array('email_verified'=>1,'email_verification_code'=>''));
        $req->session()->flash('msg','You are activated');
        return redirect('/userlogin');
    }
}
?>
