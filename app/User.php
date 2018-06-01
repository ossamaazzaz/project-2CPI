<?php

namespace App;
use App\contactMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function contactmails()
    {
        $this->hasMany(contactMail::class);
    }
    public function comments()
    {
       return $this->hasMany(Comment::class);
       /*
       return $this->hadMany(App\Comment);
       */
    }
    protected $fillable = [
        'email', 'password','username','firstName','lastName','phoneNum','adr','idCard','avatar','confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * if it causes issues, add approveState... here
     * @var array
     protected $hidden = [
        'password', 'remember_token',
     ];
     */

}
