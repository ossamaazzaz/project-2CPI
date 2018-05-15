<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Shop;
class UsersController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
   public function index()
   {
	    $users = User::get();
       $shop = Shop::find(1);

	    return view('admin.users',compact('users','shop'));
   }
   /*
   this function responsable on approve 
   * by @TH3HPBT
   */
   public function save(Request $req){
   	
      if ($req->approveIds !=null) {
        $ids = array_map('intval', explode(',', $req->approveIds));
        foreach ($ids as $id) {
          $user  = User::find($id);
          $user->approveState = "Approved";
          $user->save();
        }
      }
      if ($req->deleteIds!=null) {
        $ids = array_map('intval', explode(',', $req->deleteIds));
        User::destroy($ids);
      }
      return "Done";
   }

}
