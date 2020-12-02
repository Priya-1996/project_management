<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/first',function(){
	return view('user_registration');
});
Route::post('/registration','App\Http\Controllers\Newcontroller@registration');

Route::get('/login',function(){
	return view('login');
});

Route::get('/display',function(){
	return view('display');
});

Route::post('/login','App\Http\Controllers\Logincontroller@login');

Route::get('/display',function(){
	return view('display');
});

Route::post('/imageupload','App\Http\Controllers\Imgcontroller@imgupload');
Route::get('/imageupload','App\Http\Controllers\Imgcontroller@getimgupload');

Route::get('/imagetable',function(){
	return view('imagetable');
});

Route::get('/logout',function(){
	if(session()->has('user_id'))
	{
		session()->pull('user_id');
	}
	return redirect('login');
});
