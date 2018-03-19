<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    public function products()
    {
        return $this->hasMany('App\Product','Category_ID');
    }

    /*public function ParentCategory() {
        return $this->belongsTo('app\ParentCategory','parent_id','parent_id');
    }*/

}
