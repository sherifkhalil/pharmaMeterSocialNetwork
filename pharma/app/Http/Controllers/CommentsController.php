<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use Carbon\Carbon;
// soft delete
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentsController extends Controller
{
    public function store(Request $request){
		/* set validation of following componants*/
		$validator = Validator::make($request->all(),[
			'content' => 'Required|min:6',
		]);

		if($validator->fails())
		{// validator dosn't work
			return $validator->messages());
			
		}
		else
		{
			if(Auth::User->id)
				$user = Auth::User;
				$post = $request->post_id;
			else
				return Redirect::to('/auth/login');
			$comment = new Comment;
			$comment->user_id = $user->id;
			$comment->post_id = $post->id;
			$comment->follower_id = $follower->id;
			$comment->created_at = Carbon::now();
			$comment->save();
			/*add the interavtive values*/
			$user->personal->no_comments +=1; // currunt user num of comment increase
			$user->personal->save();
			$post->user->personal->no_interactions +=1; // post owner interactives increase
			$post->user->personal->save();
			$done = 'commentd succssufully';
			return $done;
			    // return Redirect::to('/')->with('done');
		}
	}// end of store action
}
