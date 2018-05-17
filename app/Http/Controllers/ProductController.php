<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Shop;
use App\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
class ProductController extends Controller {

	
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /*
	* to view the products on the products manager admin page
	* by Oussama Messabih edited by kacem
    */
	public function index(Request $req){
		if ($req->isMethod('get')) {
			$products = Product::get();
			$products = Product::where('deleted',0)->get();
			$notifications = Product::getnotifications();
			$shop = Shop::find(1);
			return view('admin.products',['products' => $products,'notifications' => $notifications,'shop' => $shop]);

		}
	}
	/*
	* to delete a product 
	* by Oussama Messabih
	*/
	public function delete(Request $req){
		$ids = explode(',', $req->ids);
		foreach ($ids as $id) {
			//Product::destroy($id);
			$product = Product::find($id);
			 $product->deleted  = 1; //Make it True
			 $product->quantity = 0;
			 $product->quantitySale = 0;
			$product->save();
		}
		return response()->json($ids);
	}
	/*
	* to view a product details for admin edit product page
	* by Oussama Messabih
	*/
	public function show($id){

		$product = Product::find($id);
		if ($product->productDetails->imgs != null) {

			$imgsPath = str_replace('storage', 'public', $product->productDetails->imgs );
			$imgsara = \Storage::allFiles($imgsPath);
			$imgs  = implode(" ",str_replace('public', '/storage', $imgsara ));
		}else {
			$imgs  = '/storage';
		}
		
		$shop = Shop::find(1);
		return view('admin.editProduct',compact('product','imgs','shop'));
	
		}
	/*
	* to update the edited values for a product 
	* by Oussama Messabih
	*/
	public function update(Request $req){
		$MAX_NUMBER = 5;
			$rules = [
            'name' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|numeric',
            'categoryId' => 'required|integer',
            'quantitySale' => 'integer',
            'quantity' => 'required|integer',
          
    	];
    	$imgNum = $req->imgNum;
    	$newImgs = json_decode($req->newImgs);
    	if ($req->deletedImgs == null) {
    		$delOldImgs = array();
    	}else{
    		$delOldImgs = explode(",", $req->deletedImgs);
    	}
    	
    	$imgsurls = json_decode($req->NewImgsSrc);
		// string ath of the deleted file 
    	$imgNum = ($imgNum > $MAX_NUMBER) ? $MAX_NUMBER : $imgNum;
   		
   		$validator = \Validator::make($req->all(),
            [
                'file' => 'image',
            ],
            [
                'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
            ]);
        if ($validator->fails())
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );

		$validator = \Validator::make($req->all(),$rules);
		if ($validator->fails()) {
			return response()->json(['errors'=>$validator->errors()->all()]);
		}
		
			// validated, proceed to add product
		$product = Product::find($req->id);
		$product->name = $req->all()['name'];
		$product->brand = $req->all()['brand'];
		$product->price = $req->all()['price'];
		$product->categoryId = $req->all()['categoryId'];
		$product->quantitySale = $req->all()['quantitySale'];
		$product->quantity = $req->all()['quantity'];
		$product->save();
		// add its details
		$product->productDetails->description =  $req->all()['desc'];

		$product->productDetails->save();

		// deleting the images
		// there is an issue
		if (count($delOldImgs)>0) {
			foreach ($delOldImgs as $imgsrc) {
				//dd(str_replace('/storage', '', $product->productDetails->imgs) . substr($imgsrc, strlen($imgsrc)-5));
				\Storage::disk('public')->delete(str_replace('/storage', '', $product->productDetails->imgs) . substr($imgsrc, strlen($imgsrc)-5));
				//extract the name of file from imgsrc snd its the path of the image
			}
		}
			
		//saving the new images
		$index = explode(",", $req->newImgIndex);

		$dirname = 'images/' . 'products/' . $product->id . '/';
		$relurl = '/storage/' . $dirname;
		$dirname = 'public/' . $dirname;
		
		// saving the principale image of product 
		if ($req->hasFile('pimg')) {
			
			$pimg = $req->file('pimg');
			\Storage::putFileAs(
				$dirname, $pimg,'0' .'.'. $pimg->getClientOriginalExtension()
			);
			$product->image = $relurl . '0' .'.'. $pimg->getClientOriginalExtension();
			$product->save();
		}
		$id = $imgNum+1;
		foreach ($index as $i) {
			if ($req->hasFile($i)) {
				$img = $req->file($i);
				\Storage::putFileAs(
					$dirname, $img,$id .'.'. $img->getClientOriginalExtension()
				);
				$id++;
			}	
		}	
		return response()->json($product->id); //later to redirect to product page instead

	}
	/**
	* [add a product if post request else return edit view]
	* @param Request $req [necessary input data]
	* @return  view page [<description>]
	* by renken
	*/
	public function add(Request $req) {
		$categories = Category::get();
		$shop = Shop::find(1);
		if ($req->isMethod('get')) {
			return view('admin.productAdd',compact("categories","shop"));
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
        $validator = \Validator::make($req->all(), [
           		'name' => 'required|string',
	            'brand' => 'required|string',
	            'price' => 'required|numeric',
	            'categoryId' => 'required|integer',
	            'quantitySale' => 'integer',
	            'quantity' => 'required|integer',

        ]);
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
		$productDetails->description =  $req->all()['desc'];
		$dirname = 'images/' . 'products/' . $product->id . '/';
		//create dir for product
		// \Storage::makeDirectory($dirname);
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
		return redirect('admin/products');
	}
}
