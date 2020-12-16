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

//<------------USERs ROUTING---------------->

Route::get('/user_registration','App\Http\Controllers\SignupController@index')->name('user.reg');
Route::post('/userregistration','App\Http\Controllers\SignupController@registration');

// Route::get('/loginuser/{id}',function(){
// 	return view('login');
// });

Route::get('/verify/{token}', 'App\Http\Controllers\SignupController@verifyEmail')->name('verify');

Route::get('/userlogin','App\Http\Controllers\Logincontroller@userlogin');

Route::get('/display','App\Http\Controllers\Logincontroller@display');

Route::post('/login','App\Http\Controllers\Logincontroller@login');

Route::post('/imageupload','App\Http\Controllers\Imgcontroller@imgupload');

//Route::get('/imageupload','App\Http\Controllers\Imgcontroller@getimgupload');


Route::get('/imagetable','App\Http\Controllers\Imgcontroller@imagetable');

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

//<------------------ADMIN PANEL ROUTING------------------->

Route::get('/adminlogin','App\Http\Controllers\AdminCon@adminlogin');

Route::get('/admin','App\Http\Controllers\AdminCon@login');

Route::group(['middleware'=>['adminAuth']],function(){
	Route::view('dashboard','dashboard');

	Route::get('/admindisplay',function(){
	$id=session('id');
	$data=DB::table('user_registration')->get();
	return view('admindisplay',['data'=>$data]);
});

Route::get('/dashboard','App\Http\Controllers\AdminCon@dashboard');

Route::get('cuisine','App\Http\Controllers\AdminCon@cuisine');

Route::post('addcuisine','App\Http\Controllers\AdminCon@addcuisine');

Route::get('modify','App\Http\Controllers\AdminCon@modify_cuisine');

Route::get('cuisinedelete/{id}','App\Http\Controllers\AdminCon@cuisinedelete')->name('cuisine.delete');

Route::get('/gettabledata','App\Http\Controllers\AdminCon@gettabledata')->name("get.tabledata");

//Route::get('ownerlist','App\Http\Controllers\AdminCon@resowner_list');

Route::get('/ownerdata','App\Http\Controllers\AdminCon@getownerdata')->name('data.active');

Route::get('dataedit/{id}','App\Http\Controllers\AdminCon@dataedit')->name('data.edit');

Route::post('/dataupdate','App\Http\Controllers\AdminCon@dataupdate');

Route::get('datadelete/{id}','App\Http\Controllers\AdminCon@datadelete')->name('data.delete');

Route::get('/ownerlogout',function(){
	if(session()->has('user_id'))
	{
		session()->forget('user_id');
	}
	return redirect('owner');
});
});

//<-----------------------END--------------------------->

//<---------------Email sending routes--------------->

Route::get('/emailsend','App\Http\Controllers\EmailCon@emailsend');

Route::post('/mail','App\Http\Controllers\EmailCon@send');

//<--------------------END------------------------>


//<---------Restaurant Portal Routes----------->
Route::get('/restaurant','App\Http\Controllers\RestaurantCon@index');

Route::get('/registration','App\Http\Controllers\RestaurantCon@registration');

Route::get('/restaurent_owner_reg','App\Http\Controllers\RestaurantCon@restaurant_owner');

Route::post('/resowner_reg','App\Http\Controllers\RestaurantCon@res_reg');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/activate/{email}','App\Http\Controllers\RestaurantCon@active_owner')->name('data.active');

Route::get('/owner','App\Http\Controllers\RestaurantCon@owner');

Route::post('/ownerlogin','App\Http\Controllers\RestaurantCon@owner_login');

Route::group(['middleware'=>['ownerAuth']],function(){

Route::get('/ownerdashboard','App\Http\Controllers\RestaurantCon@owner_dashboard');

Route::get('/food','App\Http\Controllers\RestaurantCon@managefood');



});

Route::post('/addfood','App\Http\Controllers\RestaurantCon@addfood');

Route::get('/searching','App\Http\Controllers\RestaurantCon@searchbar');