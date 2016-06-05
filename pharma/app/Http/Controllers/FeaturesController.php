<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Feature ;
use Illuminate\Support\Facades\Validator;


class FeaturesController extends Controller
{
    public function index()
    {
    	 
    	$features = Feature::all();

   		return view ('features.list',compact('features'));
    }

    // add new feature (for admin)
     public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:features|max:255',
        ]);

        if($validator->fails())
		{
			return back();
		}
		else
		{
			$feature = new Feature;
			$feature->name = $request->name;
			$feature->created_at = Carbon::now();
			$feature->updated_at = Carbon::now();
			$feature->save();
			return back();
		}
	}
	//delete feature (for admin)
	public function delete(Feature $feature)
	{
		$feature-> delete();
    	return back();
	}
}
