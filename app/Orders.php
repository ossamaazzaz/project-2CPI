<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
 
    public function orderItems()
    {
        return $this->hasMany('\App\OrderItem','order_id');
    }
}
