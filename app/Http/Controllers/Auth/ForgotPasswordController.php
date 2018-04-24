<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;            //
use Illuminate\Support\Facades\Password;//
//--------------------------------------//
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //@overRide
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            array_merge(
              $request->only('email'),
              ['confirmation_token' => null]
            )
        );

        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status',trans($response));
        }
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

}
