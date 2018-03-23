<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/confirmation';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *  Make sure to validate the phone number later
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
             'username' => 'required|string|max:15|alpha_num|unique:users',
             'firstName' => 'required|string|max:30|alpha',
             'lastName' => 'required|string|max:30|alpha',
             'phoneNum' => 'required|string|max:15',
             'adr' => 'required|string|max:255',
             'idCard' => 'required|string|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'required|image|mimes:jpeg,bmp,png',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $dirname = 'images/' . 'users';
        \Storage::makeDirectory($dirname);
        // for displaying purposes
        
        \Storage::putFileAs(
                'public/' . $dirname, $data['avatar'], $data['username'] .'.'. $data['avatar']->getClientOriginalExtension()
            );

        $avt = '/storage/' . $dirname . '/' . $data['username'] .'.'. $data['avatar']->getClientOriginalExtension();
        //dd($avt);
        
        return User::create([
            'username' => $data['username'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phoneNum' => $data['phoneNum'],
            'avatar' => $avt,
            'email' => $data['email'],
            'adr' => $data['adr'],
            'idCard' => $data['idCard'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
