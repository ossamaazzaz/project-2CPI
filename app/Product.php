<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    //using the trait of searching 
    use FullTextSearch;
	/**
    * Get the details record associated with the Product.
    */
    public function productDetails(){
    	return $this->hasOne('App\ProductDetails');
    }
    public function category(){
        return $this->belongsTo('App\Category','categoryId');
    }
    protected $fillable = [
        'name', 'brand','price','categoryId','quantity','quantitySale',
    ];

    /**
    * The columns of the full text index
    */
    protected $searchable = [
        'name',
        'brand'
    ];
}
