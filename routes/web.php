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
Route::view('first','user_registration');
Route::post('/registration','App\Http\Controllers\Newcontroller@registration');
Route::view('login','login');
Route::view('display','display');
Route::post('/login','App\Http\Controllers\Logincontroller@login');
Route::view('display','display');
Route::post('/imageupload','App\Http\Controllers\Imgcontroller@imgupload');

Route::get('/logout',function(){
	if(session()->has('user_id'))
	{
		session()->pull('user_id');
	}
	return redirect('login');
});
