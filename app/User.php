<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function comments()
    {
       return $this->hasMany(Comment::class);
       /*
       return $this->hadMany(App\Comment);
       */
    }
    public function rate()
    {
        return $this->hasMany('\App\Rate','user_id');
    }
    public function getNotifications()
    {
        $notificationsCollection = DB::table('notifications')->where("user_id",\Auth::id())->get();
        $notifications = array('');
        foreach ($notificationsCollection as $notif) {
            if ($notif->type == 'App\Notifications\missingproduct') {
                $notif->type = 'missingproduct';
                $notif->data = substr($notif->data,1,strlen($notif->data)-2);
            } else {
                $notif->data = substr($notif->data,1,strlen($notif->data)-2);
            }
        }
        return $notificationsCollection;
    }
    public function getNotificationsLimit($num)
    {
        $notificationsCollection = DB::table('notifications')->where("user_id",\Auth::id())->limit($num)->get();
        $notifications = array('');
        foreach ($notificationsCollection as $notif) {
            if ($notif->type == 'App\Notifications\missingproduct') {
                $notif->type = 'missingproduct';
                $notif->data = substr($notif->data,1,strlen($notif->data)-2);
            } else {
                $notif->data = substr($notif->data,1,strlen($notif->data)-2);                
            }
        }
        return $notificationsCollection;
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
