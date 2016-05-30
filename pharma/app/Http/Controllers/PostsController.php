<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;
// use App\Comment;
use App\User;
use App\Category;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Redirect;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function show($id){
		$post = Post::where('is_published', '1')->find($id);
		if(sizeof($post) > 0)
		{
			// increase view by 1 
			// $post ->views_num +=1 ;
			// $post ->save();
			return view ('pages.single',compact('post'));
		}
		else
		{
			$errors = "this page isnt avalible!!";	
			return view('errors.404',compact('errors'));
		}
			

	}
	// store new post 
	public function store(Request $request){
		/* set validation of post componants*/
		$validator = Validator::make($request->all(),[
			'content' => 'Required|min:6',

		]);
		if($validator->fails())
		{// validator dosn't work
			$errors = $validator->messages();
			$posts = Post::orderBy('created_at','DESC')->get();
			return Redirect::to('/')->with('posts,errors');
			// return "error";
		}
		else
		{
			$user = Auth::user();
			$post = new Post;
			$post->content = $request->content;
			$post->created_at = Carbon::now();
			$post->updated_at = Carbon::now();
			$post->user_id = $user->id;
			$post->user_token = $user->token;
			if (Input::hasFile('image') && Input::file('image')->isValid()) 
			{
				$file = Input::file('image');
				$destinationPath = public_path(). '/post_pictures/';
				$extension = Input::file('image')->getClientOriginalExtension();
				$filename = $post->created_at.'.'.$extension;
				$post->image = '/post_pictures/'.$filename;
				Input::file('image')->move($destinationPath, $filename);
				Image::make($destinationPath.$filename)->insert(public_path().'/images/logo.png','bottom-right')->resize(900, 300)->save($destinationPath.$filename);

				$post->save();
				$done = 'post add succssufully';
				$posts = Post::orderBy('created_at','DESC')->get();
			    return Redirect::to('/')->with('posts,done');
			    // return "done";
			}
			else 
			{
			      // sending back with error message.
				$post->save();
				$done = 'post add succssufully';
				$posts = Post::orderBy('created_at','DESC')->get();
			    return Redirect::to('/')->with('posts,done');
			    // return "done without image";
			}
		}//end of valid validator
	}
}
