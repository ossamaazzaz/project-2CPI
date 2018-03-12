<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }
    public function edit()
    {
        return view('auth.edit');
    }
    public function update(Request $req) {
        $user = \Auth::user();
        $validator =  \Validator::make($req->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);
        $emailCheck = ($req->input('email') != '') && ($req->input('email') != $user->email);
         $rules = [];
        if ($emailCheck) {
                $rules = [
                'email' => 'email|max:255|unique:users',
            ];
             $validator = $this->validator($req->all(), $rules);  
        }
        

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if($emailCheck) {
            $user->email = $req->all()['email'];   
        }
        
        $user->password = \Hash::make($req->all()['password']);
        $user->save();
        return view('auth.edit');
    }
}
