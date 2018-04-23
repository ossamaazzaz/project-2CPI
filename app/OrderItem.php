<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function order()
    {
        return $this->belongsTo('\App\Orders');
    }

}
