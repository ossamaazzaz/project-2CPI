<?php

namespace App;



class ProductDetails extends Model
{
    use FullTextSearch;

    /**
    * Get the product that owns this details.
    */

    public function comments(){
      return $this->hasMany(Comment::class);
      /*
      return $this->hadMany(App\Comment);
      */
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    protected $fillable = ['product_id'];

    protected $searchable = ['description'];

}
