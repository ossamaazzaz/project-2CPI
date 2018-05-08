<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'logo', 'link', 'email', 'terms', 'addr', 'phone_num', 'fb_link', 'insta_link', 'twitter_link', 'quotes', 'slides'   
         ];

}
