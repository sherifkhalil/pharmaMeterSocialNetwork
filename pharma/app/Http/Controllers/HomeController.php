<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;
use App\Follower;
use App\User;
use App\Personal_data;
use View;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $layout = 'layouts.app';
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user()->id;

        $followers = follower::where('user_id',$user)->pluck('follower_id');
        /*get top user with max num of posts*/
        $top_post_to_follow = Personal_data::whereNotIn('user_id', $followers)->where('user_id','!=', $user)->orderBy('no_posts', 'desc')->take(6)->get();
        Session::put('top_post_to_follow', $top_post_to_follow);
        /*get top user with max num of floowers */
        $top_followers_to_follow = Personal_data::whereNotIn('user_id', $followers)->where('user_id','!=', $user)->orderBy('no_followers', 'desc')->take(6)->get();
        Session::put('top_followers_to_follow',$top_followers_to_follow);
        /*get all user with order num of floowers */
        $top_to_follow = Personal_data::whereNotIn('user_id', $followers)->where('user_id','!=', $user)->orderBy('no_posts', 'desc')->get();
        Session::put('top_to_follow', $top_to_follow);
        
        $posts = Post::whereIn('user_id', $followers)->orWhere('user_id',$user)->orderBy('created_at','DESC')->get();
        return view('index',compact('posts'));

    }
}
