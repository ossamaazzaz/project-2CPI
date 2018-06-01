<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Notifications\RegisteredUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/home';

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
    //==============================(EmailComfirmation)Mouloud===========================//
    /*
    * utiliser le trait RegistersUsers
    * @overRide register(Request $request) function
    * apres la registration il faut envoyer un email de comfirmation a l utilisateur suivant un lien de confirmation
    */
    public function register(Request $request){
      $this->validator($request->all())->validate();

      event(new Registered($user = $this->create($request->all())));

      $user->notify(new RegisteredUser());

      return redirect('/login')->with('success','Votre compte a bien été crée ,vous devez le comfirmer avec l\'email que vous  allez recevoir');
    }

    public function confirm($id,$token){

      $user= User::where("id",$id)->where('confirmation_token',$token)->first();
      if($user){
        //mettre a jour l utilisateur et mettre le confirmation_token=Null
        //confirmation_token=Null <==> utilisateur Confirmer
        $user->update(['confirmation_token' => null]);
        //user login auto
        $this->guard()->login($user);
        //apres que l utilisateur est connecter je le redirige vers son compte
        //le redirectPath suit protected $redirectTo = '/home';
        return redirect($this->redirectPath())->with('success','Votre compte a été bien confirmer');


      } else {
        return redirect('/login')->with('error','Ce lien n est plus valide');
      }
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
            'confirmation_token' => str_replace('/','',bcrypt(str_random(16)))
        ]);
    }
}
