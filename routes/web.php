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

Route::get('/user_registration','App\Http\Controllers\SignupController@index')->name('user.reg');
Route::post('/registration','App\Http\Controllers\SignupController@registration');

// Route::get('/loginuser/{id}',function(){
// 	return view('login');
// });

Route::get('/userlogin',function(){
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

//Route::get('/imageupload','App\Http\Controllers\Imgcontroller@getimgupload');


Route::get('/imagetable',function(){
	return view('imagetable');
});

Route::get('/imagetable',function(){
	$id=session('user_id');
	$data=DB::table('image_table')->where('user_id',$id)->get();
	return view('imagetable',['data'=>$data]);
});

Route::get('imagedelete/{id}','App\Http\Controllers\Imgcontroller@imgdelete')->name('image.delete');

Route::get('/logout',function(){
	if(session()->has('user_id'))
	{
		session()->forget('user_id');
	}
	return redirect('login');
});

Route::get('/adminlogin',function(){
	return view('adminlogin');
});

Route::get('/admin','App\Http\Controllers\AdminCon@login');

Route::group(['middleware'=>['adminAuth']],function(){
	Route::view('dashboard','dashboard');

	Route::get('/admindisplay',function(){
	$id=session('id');
	$data=DB::table('user_registration')->get();
	return view('admindisplay',['data'=>$data]);
});

Route::get('/dashboard',function(){
	return view('dashboard');
});

Route::get('cuisine','App\Http\Controllers\AdminCon@cuisine');

Route::post('addcuisine','App\Http\Controllers\AdminCon@addcuisine');

Route::get('modify','App\Http\Controllers\AdminCon@modify_cuisine');

Route::get('cuisinedelete/{id}','App\Http\Controllers\AdminCon@cuisinedelete')->name('cuisine.delete');

Route::get('/gettabledata','App\Http\Controllers\AdminCon@gettabledata')->name("get.tabledata");

Route::get('dataedit/{id}','App\Http\Controllers\AdminCon@dataedit')->name('data.edit');

Route::post('/dataupdate','App\Http\Controllers\AdminCon@dataupdate');

Route::get('datadelete/{id}','App\Http\Controllers\AdminCon@datadelete')->name('data.delete');

Route::get('/adminlogout',function(){
	if(session()->has('user_id'))
	{
		session()->forget('user_id');
	}
	return redirect('adminlogin');
});
});


Route::get('/emailsend',function(){
	return view('emailsend');
});

Route::post('/mail','App\Http\Controllers\EmailCon@send');



//<---------Restaurant Portal Routes----------->
Route::get('/restaurant','App\Http\Controllers\RestaurantCon@index');

Route::get('/reg_type','App\Http\Controllers\RestaurantCon@registration');

Route::get('/restaurent_owner_reg','App\Http\Controllers\RestaurantCon@restaurant_owner');

Route::post('/resowner_reg','App\Http\Controllers\RestaurantCon@res_reg');

