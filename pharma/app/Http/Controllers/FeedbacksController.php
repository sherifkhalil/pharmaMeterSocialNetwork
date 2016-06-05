<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Feedback;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Redirect;
use Illuminate\Support\Facades\Validator;
class FeedbacksController extends Controller
{

	// store new post 
	public function store(Request $request,$id){
		/* set validation of post componants*/
        $this->validate($request, [
            'content' => 'required',
        ]);

			$user = Auth::user();
			$feedback = new Feedback;
			$feedback->content = $request->content;
			$feedback->user_id = $user->id;
			$feedback->feature_id=$id;
			$feedback->save();
			return Redirect::back();

	}
	
}
