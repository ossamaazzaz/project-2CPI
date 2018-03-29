<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class search extends Model
{
	use FullTextSearch;
    
    protected $table = 'searches';
    protected $searchable = [
		'name',
        'brand',
        'description'
    ];
}
