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
	    $users = User::get();
	    return view('admin.users',compact('users'));
   }
   /*this function responsable on approve the user @TH3HPBT*/
   public function approve(Request $req){
   		$ids = array_map('intval', explode(',', $req->ids));

   		foreach ($ids as $id) {
   			$user  = User::find($id);
   			$user->approveState = "Approved";
   			$user->save();
   		}
   		return "ApprovingOpDone";
   }

}