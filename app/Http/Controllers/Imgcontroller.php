<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uploadmodel;

class Imgcontroller extends Controller
{
	protected $namespace='App\Http\Controllers';
    function imgupload(Request $req)
    {
    	$files = [];
    	if($req->hasfile('image'))
    	{
    		foreach($req->file('image') as $file)
            {
                $image_name = time().rand(123456,999999).'.'.$file->extension();
                $file->move(public_path('images'), $image_name);  
                $files[] = $image_name;  
            }
        }


    	        $file= new Uploadmodel();
                $file->image_name = $files[];
                $file->save();
                $data=Uploadmodel::all();
                print_r($data);
                exit();
                //echo "Image uploaded";
    	        return view('imagetable',['data'=>$data]);
    	    

    	}
    	// function getimgupload(Request $r)
    	// {
    	// 	die('Hi');
    	// }
    	
    	
    }

