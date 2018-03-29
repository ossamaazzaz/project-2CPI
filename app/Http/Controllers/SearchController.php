<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductDetails;
use App\search;
class SearchController extends Controller
{
	public function search(Request $req){

		$result = ProductDetails::search('kutc')->orWhereHas('Product',function($q){
			$q->search('kutc');
		})->get();
		dd($result);
	}   
}
