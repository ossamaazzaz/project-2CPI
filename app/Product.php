<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
    * Get the details record associated with the Product.
    */
    public fucntion productDetails(){
    	return $this->hasOne('App\ProductDetails');
    }
}
