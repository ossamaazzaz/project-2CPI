<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;

class ConfirmationMessage extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'userId',
    ];

    // this function generate a code and send it to the client in sms 
	public static function sendCode($user){
		// api twilio sid and token 
		$sid = 'AC7fdf692f99696fcabf419a1d62df491e';
		$token = 'a0cd47f7eeed023ea7b18c59eb0638b9';
		$client = new Client($sid, $token);
		// generate a code 
		$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$code = $alphabet[rand(0, 25)].rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		//saving the code 
		$conmes = new ConfirmationMessage;
		$conmes->code  = $code;
		$conmes->user_id = $user->id;
		$conmes->save();

		// Use the client to do fun stuff like send text messages!
		$client->messages->create(
		    // the number you'd like to send the message to
		    $user->phoneNum,
		    array(
		        // A Twilio phone number you purchased at twilio.com/console
		        'from' => '+18134134239',
		        // the body of the text message you'd like to send
		        'body' => 'Your code '.$code
		    )
		);
	}
	
}
