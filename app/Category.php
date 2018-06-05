<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    public function products()
    {
        return $this->hasMany('App\Product','categoryId');
    }

    public function NbProducts()
    {
    	return $this->products->count();
    }

   
}
