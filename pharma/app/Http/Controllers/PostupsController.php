<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Post;
use App\Postup;
use Carbon\Carbon;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;

class PostupsController extends Controller
{
    public function store($post_id,Request $request){
		/* set validation of following componants*/
			$result = array();
			if(Auth::user()->id)
			{
				$user = Auth::user();
				$post = Post::find($post_id);
				$postups = $user->postups;
			}
			else
			{
				return Redirect::to('/auth/login');
			}
			
			foreach ($postups as $key => $postup)
			{
	           if($postup['post_id'] == $post->id)
				{
					$postup->delete();
					$post->user->personal->no_interactions -=1; // post owner interactives decrease
					$post->user->personal->save();
					$result['like'] = "duplicate";
					$result['count'] = $post->postups->count();
					return $result;
				}

	        } 
			$postup = new Postup;
			$postup->user_id = $user->id;
			$postup->post_id = $post_id;
			$postup->created_at = Carbon::now();
			$postup->save();
			/*add the interavtive values*/
			$post->user->personal->no_interactions +=1; // post owner interactives increase
			$post->user->personal->save();
			// $done = 'commentd succssufully';
			$result['like'] = "liked";
			$result['count'] = $post->postups->count();
			return $result;
	}// end of store action
}
