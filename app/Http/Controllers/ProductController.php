<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductDetails;
use Illuminate\Http\Request;

class ProductController extends Controller {

    
	public function index(Request $req){
		if ($req->isMethod('get')) {
			$products = Product::paginate(15);
			return view('admin.products',['products' => $products]);
		} else {
			dd($req);
		}
	}

	/**
	* [add a product if post request else return edit view]
	* @param Request $req [necessary input data]
	* @return  view page [<description>]
	*/
	public function add(Request $req) {
		if ($req->isMethod('get')) {
			return view('admin.productAdd');
		}
		/*
		* In front-end, use JS to check if
		* quantitySale <= quantity
		 */
		$rules = [
	            'name' => 'required|string',
	            'brand' => 'required|string',
	            'price' => 'required|numeric',
	            'categoryId' => 'required|integer',
	            'quantitySale' => 'integer',
	            'quantity' => 'required|integer',
	            'image' => 'image',
        	];

		$validator = \Validator::make($req->all(),$rules);
		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}
		// validated, proceed to add product
		$product = new Product();
		$product->name = $req->all()['name'];
		$product->brand = $req->all()['brand'];
		$product->price = $req->all()['price'];
		$product->categoryId = $req->all()['categoryId'];
		$product->quantitySale = $req->all()['quantitySale'];
		$product->quantity = $req->all()['quantity'];
		$product->save();

		$productDetails =  new ProductDetails();
		$productDetails->product_id = $product->id;
		$productDetails->save();
		return view('admin.productAdd'); //later to redirect to product page instead
	}

}
