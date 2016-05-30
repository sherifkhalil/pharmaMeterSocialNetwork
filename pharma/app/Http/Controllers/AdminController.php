<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
	public function index(){
		echo 'dashboard';
	}
	
}
