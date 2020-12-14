<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function register(Request $req)
    {
        $user=new Signupmodel();
        $user->fname=$req->input('fname');
        $user->lname=$req->input('lname');
        $user->email=$req->input('email');
        $user->password=md5($req->input('password'));
        $user->about=$req->input('about');
        $user->latitude=$req->input('latitude');
        $user->longitude=$req->input('longitude');
        $user->verification_code=sha1(time());
        $user->save();

        if($user!=null)
        {
            EmailCon::send($user->fname, $user->email, $user->verification_code);
            return redirect()->back()->with(session()->flash('alert-success','New account created. Please check your email to vrify.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger','New account created. Please check your email to vrify.'));
    }
}
