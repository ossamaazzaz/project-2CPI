<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Orders extends Model
{
	use Notifiable;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
 
    public function orderItems()
    {
        return $this->hasMany('\App\OrderItem','order_id');
    }
}
