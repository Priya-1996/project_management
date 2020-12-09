<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantCon extends Controller
{
	protected $namespace='App\Http\Controllers';
    public function index()
    {
    	return view('restaurant_portal');
    }
    public function registration()
    {
    	return view('reg_type');
    }
    public function restaurant_owner()
    {
    	return view('restaurant_owner');
    }

}
