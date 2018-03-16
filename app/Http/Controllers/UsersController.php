<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
class UsersController extends Controller
{
   public function index() 
   {
	    $users = User::paginate(10);
	    return view('admin.users',compact('users'));
   }
   public function approve(Request $req){
   		$ids = explode(',',$req->ids,0);

   		return $ids;
   }

}