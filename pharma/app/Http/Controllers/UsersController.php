<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use Request;
use Auth;
use DB;

class UsersController extends Controller
{
    public function profile()
    {
    	$user_id = Auth::user()->id;
    	$profile = DB::table('personal_datas')->where('user_id',$user_id )->first();
        return view('users.profile',compact('profile'));
        // var_dump($profile);
    }
}
