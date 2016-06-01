<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use Request;
use Auth;
use DB;
use App\User;
use App\Personal_data;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function profile()
    {
    	$user_id = Auth::user()->id;
    	$profile = DB::table('personal_datas')->where('user_id',$user_id )->first();
        if($profile == null)
        {
            // return "insert new personal data record";
            $profile = new Personal_data ;
           
            $profile->user_id = Auth::user()->id;
            $profile->image = "/profilepic/1.png";
            $profile->save();
            return view('users.profile',compact('profile'));  
        }
        else
        {
            return view('users.profile',compact('profile'));  
            // return "Not Empty record"; 
        }
        
        // var_dump($profile);
    }
    public function edit()
    {
    	return view('users.edit');
    }

    public function update(User $user, Request $request)
    {
        $id = Auth::user()->id;
        $currentuser = User::where('id',$id)->first();


        $currentuser->name = $request->uname;
        $currentuser->email = $request->email;
        $currentuser->update();


        $profile = Personal_data::where('user_id','=',$id )->first();
        $profile->first_name = $request->fname;
        $profile->last_name = $request->lname;
        $profile->degree = $request->degree;
        $profile->company = $request->company;
       





         if (Input::hasFile('image'))
         {
            $imageName =  Carbon::now(). '.' . 
            $request->file('image')-> getClientOriginalExtension();
            $profile->image = '/profilepic/'.$imageName;
            $profile->update();
            $request->file('image')->move(
            base_path() . '/public/profilepic/', $imageName );
         }
         else
        {
              $profile->image = $profile->image;
              $profile->update();
        }

         
        
          // var_dump($profile);
          return redirect('/users/profile');
    }
}
