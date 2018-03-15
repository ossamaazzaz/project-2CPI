<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UsersController extends Controller
{
   public function GetUsers() 
   {
	    $users = DB::table('users')->latest()->get();
	    return view('admin.users',compact('users'));
   }
   public function approveUsers(){
   		dd(request()->all());
   }
}