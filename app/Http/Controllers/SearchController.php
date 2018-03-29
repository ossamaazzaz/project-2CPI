<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductDetails;
use App\search;
class SearchController extends Controller
{
	public function search(Request $req){

		$result = search::where( 'id', '=', '1' )->get();
		dd($result);
	}   
}
