<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;


class CommentsController extends Controller
{
    public function store($post_id,Request $request){
		/* set validation of following componants*/
		$validator = Validator::make($request->all(),[
			'content' => 'Required|min:6',
		]);

		if($validator->fails())
		{// validator dosn't work
			return $validator->messages();
			
		}
		else
		{
			if(Auth::user()->id)
			{
				$user = Auth::user();
				$post = Post::find($post_id);
			}
			else
				return Redirect::to('/auth/login');
			$comment = new Comment;
			$comment->user_id = $user->id;
			$comment->post_id = $post_id;
			$comment->content = $request->content;
			$comment->created_at = Carbon::now();
			$comment->save();
			/*add the interavtive values*/
			$user->personal->no_comments +=1; // currunt user num of comment increase
			$user->personal->save();
			$post->user->personal->no_interactions +=1; // post owner interactives increase
			$post->user->personal->save();
			// $done = 'commentd succssufully';
			return $comment;
			    // return Redirect::to('/')->with('done');
		}
	}// end of store action
}
