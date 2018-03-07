<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','username','firstName','lastName','phoneNum','adr','idCard',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * if it causes issues, add approveState... here
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
