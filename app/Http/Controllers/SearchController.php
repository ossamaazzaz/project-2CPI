<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
class SearchController extends Controller
{
    /**
     * [filter the search query]
     * @param  Request $req [query]
     * filters: 
     * term: product name || desc,
     * sort[ASC 0, DESC 1] should be done on front end(?),
     * sortBy[product -price-brand-category],
     * price [lowest-highest], 
     * brand [single],
     * category [single], 
     * pagination
     * www.website.dz/search?term=something+anything&sort=0&sortBy=2&pl=0&ph=3000&brand=brand1&cat=1&page=1
     * @return [array]       [results]
     */
    public static function filter(Request $req) {
    		//validate input
    		
    		$results = DB::table('products')
    					->join('product_details', 'products.id', '=', 'product_details.product_id')
    					->select('products.id', 'products.name','products.price','products.categoryId',
    					'products.brand','product_details.desc','product_details.rating')
    					;
    		//dd($results);
    		//dd($req);
    		//products w/ given category
    		
    		if ($req->has('category')) {
    			$results = $results->where('categoryId',$req->all()['category']);
    			
    		}
    		
    		// ^ w/ given brand
    		if ($req->has('brand')) {
    			$results = $results->where('brand',$req->all()['brand']);
    			
    		}
    		// ^ w/ given price 
    		// $users = DB::table('users')
      		//               ->whereBetween('votes', [1, 100])->get();
    		// $pl = ($req->$req->has('pl')) ? $req->all()['pl'] : 0;
    		if ($req->has('pl')) {
    			$results = $results->where('price','>=', $req->all()['pl']);
    		}
    		// $ph = ($req->$req->has('ph')) ? $req->all()['ph'] : -1;
    		if ($req->has('ph')) {
    			$results =  ($req->has('pl') && $req->all()['ph'] > $req->all()['pl'] ) ? $results->where('price','<=', $req->all()['ph']) : $results;
    			
    		}

    		// ^ w/ given term
    		// SELECT * FROM `product_details` WHERE MATCH (`desc`) AGAINST ('lorem') 
    		if ($req->has('term')) {
    			$results = $results->where('desc', 'LIKE', "%". $req->all()['term'] . "%");
    			
    		}
    		
    		//sort ^ 
    		$orders = array('LENGTH(name)','price','categoryId','LENGTH(brand)');
		$key = ($req->has('orderBy') &&  $req->all()['orderBy'] < count($orders) && $req->all()['orderBy'] >= 0 ) ?
									$orders[$req->all()['orderBy']] : $orders[0];  
    		$ordtype = ($req->has('sort') &&$req->all()['sort'] == 'desc') ? 'desc' : 'asc';
    		
    		//$results = $results->orderBy($key,$ordtype);  // sort it alphabeticly only
    		$results = $results->orderByRaw($key .' '. $ordtype); //sort it alphanumiricly
    		//paginate(p)
    		$results = $results->paginate(15);
    		//return results
    		dd($results);
    		return view('admin.admin');
    }
}
