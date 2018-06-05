<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Shop;
use DB;
class DashbaordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(){
    	$shop = Shop::find(1);
    	$comments = \App\Comment::orderBy('created_at', 'desc')->get();
		$orders = \App\Orders::orderBy('created_at', 'desc')->get();	

		for ($i=0; $i <12 ; $i++) { 
			$revenues[$i]=0;
			$month_orders = \App\Orders::whereMonth('created_at', $i+1)->get();
			for ($j=0; $j < count($month_orders); $j++) {
				$revenues[$i] += $month_orders[$j]->total_paid;
			}
		}


        $Total_Products = DB::table('products')->count();
        $Total_users = DB::table('users')->where('approveState','Approved')->count();

        $Total_Revenue = 0;
        for ($i=0; $i < count($orders); $i++) { 
            $Total_Revenue += $orders[$i]->total_paid;
        }
		
        $Completed_Orders = 0;
        $Completed_Orders=0;
        for ($i=0; $i < count($orders); $i++) { 
            if ($orders[$i]->state == 4) {
                $Completed_Orders++;
            }
        }

        //Never mind this categories shit, i'm using it just for the charts
        $SortedCategories = \App\Category::all()->sortBy(function ($cat) {
            return $cat->products->count();
        });
        
        for ($i=0; $i < min(5,count($SortedCategories)) ; $i++) { 
            $CategoriesNames[$i] = $SortedCategories[$i]->name;
            $CategoriesValues[$i] = $SortedCategories[$i]->products->count();
        }

        $acceptedOrders = DB::table('orders')->where('state','1')->count();
        $prepOrders = DB::table('orders')->where('state','3')->count();
        $askedOrders = DB::table('orders')->where('state','8')->count();

    	return view('admin.admin', compact('shop','comments','orders','revenues','Total_Revenue','Total_Products','Total_users','Completed_Orders','CategoriesValues','CategoriesNames',
            'acceptedOrders','prepOrders','askedOrders'));
    }


}
