<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $products = Product::get();
        $categories = Category::get();
        return view('home',compact("products","categories"));
    }
    /**
    * Show the edit page
    * 
    * @return view of auth/edit.blade.php
     */
    public function edit()
    {
        return view('auth.edit');
    }

    /**
    * Apply changes to the user
    * @param Request $req 
    * @return  view of auth/edit.blade.php
    * 
     */
    public function update(Request $req) {
        $user = \Auth::user();

        $validator =  \Validator::make($req->all(), [
            'firstName' => 'required|string|max:30|alpha',
            'lastName' => 'required|string|max:30|alpha',
            'phoneNum' => 'required|string|max:15',
            'adr' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $emailCheck = ($req->input('email') != '') && ($req->input('email') != $user->email);
        if ($emailCheck) {
                $rules = [
                'email' => 'email|max:255|unique:users',
            ];
             $validator = \Validator::make($req->all(), $rules);
        }

        //dd($req->hasFile('avatar'));
        if ($req->hasFile('avatar')) {
                $rules = [
                'avatar' => 'required|image|mimes:jpeg,jpg,bmp,png',
                ];
                 $validator = \Validator::make($req->all(), $rules);  
        }
        
        //validating

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // saving input
        if($emailCheck) {
            $user->email = $req->all()['email'];
        }

        if($req->hasFile('avatar')) {
            \Storage::delete($user->avatar);
            $dirname = 'images/' . 'users';
            \Storage::putFileAs(
                'public/' . $dirname, $req->file("avatar"), $user->username .'.'. $req->file("avatar")->getClientOriginalExtension()
            );

             $avt = '/storage/' . $dirname . '/' . $user->username .'.'. $req->file("avatar")->getClientOriginalExtension();

            $user->avatar = $avt;   
        }
        $user->firstName = $req->all()['firstName'];   
        $user->lastName = $req->all()['lastName'];   
        $user->phoneNum = $req->all()['phoneNum'];   

        $user->adr = $req->all()['adr'];
        $user->password = \Hash::make($req->all()['password']);
        $user->save();
        return view('auth.edit');
    }
}
