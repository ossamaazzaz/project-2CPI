<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductDetails;
class SearchController extends Controller
{
	public function search(Request $req){
		$result = Product::search('home')->get();
		dd($result);
	}    
}
