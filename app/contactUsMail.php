<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class contactUsMail extends Model
{
  use Notifiable;
  public function Sender()
  {
    //comment->product_details
    return $this->hasOne(User::class);
  }
}
