<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use DB;
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
    public function archive(){
    	$order_archive = DB::table('orders_archive')->where('order_id',$this->id)->first();
    	return $order_archive;
    }
}
