<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Account;
use App\Personal_data as Personal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct(){
        #$this->middleware('admin');
        #$this->middleware($this->adminMiddleware(), ['except' => 'logout']);
    	$this->middleware('auth');
   }
	public function index(){
        $users = User::withTrashed()->get();
        return view('admin.dashboard', compact('users'));
    }

	public function delete($id='')
	{
		if (isset($id)){
			$user = User::withTrashed()->where('id', '=', $id)->first();
			if ($user->deleted_at == null) {
				$user->personal->delete();
				$user->delete();
				$errors = '';
			}
			else{
				$error = "user is deleted already";
				
			} 
			// return Redirect::to('/admin', compact('errors'));
			return back();

		}
	}

	public function restore($id='')
	{
		if (isset($id)){
			$user = User::withTrashed()->where('id', '=', $id)->first();
			if($user->trashed()) {
				$user->restore();
				$personal = Personal::withTrashed()->where('user_id', '=', $user->id)->first();
				$personal->restore();
				$errors = '';
			}
			else{
				$error = "user is active already";		
			} 
			// return view('admin.dashboard', compact('errors'));
			return back();

		}
	}

	public function generate(Request $request)
	{

		if ($request->isMethod('post')){
			$validator = Validator::make($request->all(),[
			'name' => array( 'required', 'alpha_dash', 'max:200' ),
			'email' => array( 'required', 'email', 'unique:users', 'min:6', 'max:200' ),
			'id_number' => array('unique:users'),
			'password' => array( 'required', 'min:6'),

			]);

			if($validator->fails())
			{
				$errors= $validator->messages();
				return view('admin.generate',compact('errors'));
				
			}
			else{
				$user = new User;
				$user->name = $request->name;
				$user->email = $request->email;
				if ($request->id_number) {
					$id_number = $request->id_number;
					// if (User::where('id_number', '=', $id_number)->exists()) {
					// 	$error = 'This ID Number already exists';
					//    return view('admin.generate', compact('error'));
					// }
				}
				else {
					
					do {
						$id_number = 'null'.uniqid();
					} while (User::where('id_number', '=', $id_number)->exists());
				}
				$user->id_number = $id_number;
				$user->password = bcrypt($request->password);
				$user->type = $request->type;
				$user->save();
				$personal = new Personal;
				$personal->user_id = $user->id;
				$personal->image = '/profilepic/1.png';
				$personal->first_name = $request->name;
				$personal->password = $request->password;
				$personal->save();
				if ($request->get('account_id')) {
					Account::find($request->get('account_id'))->delete();
				}
				$message = 'Account Has Been Generated Successfully !!';
				return view('admin.generate',compact('message'));
			}
		}
		return view('admin.generate');
	}

	// public function single($value='')
	// {
	// 	# code...
	// }

}
