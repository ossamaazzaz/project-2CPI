<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductDetails;
use Illuminate\Http\Request;


class ProductController extends Controller {


	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
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
		* Client-side to limit file upload
		 */
		$MAX_NUMBER = 5;
		$rules = [
	            'name' => 'required|string',
	            'brand' => 'required|string',
	            'price' => 'required|numeric',
	            'categoryId' => 'required|integer',
	            'quantitySale' => 'integer',
	            'quantity' => 'required|integer',
	          
        	];
        	//dd($req->file("images")); //for testing
        	$imgNum = count($req->file("images"));
        	
        	$imgNum = ($imgNum > $MAX_NUMBER) ? $MAX_NUMBER : $imgNum;
        	for ($i=0;$i<$imgNum;$i++){
        		//verify image rule
        		$rules['images.' . $i] = 'required|image|mimes:jpeg,bmp,png';
        	}
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
		// add its details
		$productDetails =  new ProductDetails();
		$productDetails->product_id = $product->id;
		$productDetails->desc =  $req->all()['desc'];
		$dirname = 'images/' . 'products/' . $product->id;
		//create dir for product
		\Storage::makeDirectory($dirname);
		// for displaying purposes
		$relurl = '/storage/' . $dirname;
		$dirname = 'public/' . $dirname;
		$productDetails->imgs = $relurl;
		$imgs = $req->file("images");
		if (!empty($imgs)) {
			//save first image url
			\Storage::putFileAs(
				$dirname, $imgs[0],'0' .'.'. $imgs[0]->getClientOriginalExtension()
			);
			$product->image = $relurl . '0' .'.'. $imgs[0]->getClientOriginalExtension();
			$product->save();
			for($i=1;$i<$imgNum;$i++){
				\Storage::putFileAs(
				$dirname, $imgs[$i], $i .'.' . $imgs[$i]->getClientOriginalExtension()
				);
			}
		}
		$productDetails->save();
		return view('admin.productAdd'); //later to redirect to product page instead
	}

}
