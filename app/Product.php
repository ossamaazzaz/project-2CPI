<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
    * Get the details record associated with the Product.
    */
    public function productDetails(){
    	return $this->hasOne('App\ProductDetails');
    }

    protected $fillable = [
        'name', 'brand','price','categoryId','quantity','quantitySale',
    ];
}
