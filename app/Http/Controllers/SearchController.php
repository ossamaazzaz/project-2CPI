<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Product;
use App\ProductDetails;
use DB;
use App\Category;
class SearchController extends Controller
{
	/*
	* search function by Oussama messabih
	*/
	public function search(Request $req){
		//its return the products that their name and brand and description contain the keyword
        $categories = Category::all();
		//return view('searchresult',compact('result','categories'));

        if ($req->has('term')) {
            $term = $req->all()['term'];
            $result = Product::search($term)->orWhereHas('ProductDetails', function($q) use ($term){
            $q->search($term);
        })->get();
        }
        else {
            $result = Product::all();
            }
        $category = Category::find($req->has('category'));
        return view('searchresult',compact('categories','result','term' ,'category'));
        //$result = $this->filter($req,$result);
	} 


    /**
     * [filter the search query]
     * @param  Request $req [query]
     * filters: 
     * sort[ASC 0, DESC 1],
     * sortBy[product-price-brand-category],
     * price [lowest-highest], 
     * brand [single],
     * category [single], 
     * pagination[page number]
     * www.website.dz/search?term=something+anything&sort=0&sortBy=2&pl=0&ph=3000&brand=brand1&category=1&p=1
     * @return [LengthAwarePaginator]       [Paginator]
     * Methods you can use:
     * ->currentPage(), values(), firstItem(), lastPage(), url(page),
     * nextPageUrl(), perPage(), previousPageUrl(), lastItem(),
     * total().
     * by renken
     */
    public function filter(Request $req,$results) {
    		
    		if ($req->has('category')) {
    			$results = $results->where('categoryId',$req->all()['category']);    			
    		}
    		
    		// ^ w/ given brand
    		if ($req->has('brand')) {
    			$results = $results->where('brand',$req->all()['brand']);
    			
    		}
    		// ^ w/ given price 
    		if ($req->has('pl')) {
    			$results = $results->where('price','>=', $req->all()['pl']);
    		}

    		if ($req->has('ph')) {
    			$results =  ($req->has('pl') && $req->all()['ph'] > $req->all()['pl'] ) ? $results->where('price','<=', $req->all()['ph']) : $results;
    			
    		}

    		//sort ^ 
            $orders = array('name','price','categoryId','brand');
		  
            $key = ($req->has('sortBy') &&  $req->all()['sortBy'] < count($orders) && $req->all()['sortBy'] >= 0 ) ?
									$orders[$req->all()['sortBy']] : $orders[0];  
    		
              $results =  ($req->has('sort') &&$req->all()['sort'] == 'desc') ?  $results->sortByDesc($key) : $results->sortBy($key);
    		//paginate(p)

                $p = $req->has('p') ? $req->all()['p']  : null;
                $p = $p ?: (Paginator::resolveCurrentPage() ?: 1);
                //$results clearly is instanceof Collection but this will  make it work regardless of the given data.
                $results = $results instanceof Collection ? $results : Collection::make($results); 
                return new LengthAwarePaginator($results->forPage($p,15), $results->count(), 15, $p);
    }

}
