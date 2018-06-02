<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use \App\User;
use App\contactUsMail;
class contactUsMailing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $contactMail;
    public function __construct(contactUsMail $contactMail)
    {
      $this->contactMail= $contactMail ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $user   = User::find($this->contactMail->user_id);
      $username   = ($user->firstName.' '.$user->lastName);
      $userEmail  = $user->email;
      $body       = $this->contactMail->body;
      $subject    = $this->contactMail->subject;
      return $this->from($userEmail)
                  ->view('emails.contactUs',compact('body','subject','username'));
    }
}
