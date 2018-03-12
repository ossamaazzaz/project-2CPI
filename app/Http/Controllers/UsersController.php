<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    
    public function users(Request $req){
    	$users = User::all();
    	return view('users');
    }

}
