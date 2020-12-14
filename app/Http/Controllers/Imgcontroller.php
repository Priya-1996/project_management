<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uploadmodel;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\File;

class Imgcontroller extends Controller
{
	protected $namespace='App\Http\Controllers';
    function imgupload(Request $req)
    {
    	if($req->hasfile('image'))
    	{
    		foreach($req->file('image') as $file)
            {
                $image_name = time().rand(123456,999999).'.'.$file->extension();
                $file->move(public_path('images'), $image_name);  
                $files = $image_name; 
                DB::table('image_table')->insert(['image_name'=>$files , 'user_id'=>$req->id]); 
            }
            return view('display');
        }
    	    

    	}
        function imagetable()
        {
            return view('imagetable');
        }
    	// function getimgupload(Request $r)
    	// {
    	// 	die('Hi');
    	// }
    	function imgdelete($id)
    	{
    		$data=Uploadmodel::find($id);
    		$datapath=public_path().'\images\\'.$data->image_name;
    		if(file_exists($datapath))
    		{
    			unlink($datapath);
    		}
    		$data->delete();
    		return redirect()->back()->with('success','Successfully deleted');
    	}
    		
    	
    	
    }

