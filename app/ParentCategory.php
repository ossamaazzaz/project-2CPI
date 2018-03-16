<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    //
    public function Categories()
    {
        return $this->hasMany('app\Category','parent_id','parent_id');
    }
}
