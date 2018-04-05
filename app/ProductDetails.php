<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    /**
    * Get the product that owns this details.
    */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
        protected $fillable = [
        'product_id',
    ];
}
