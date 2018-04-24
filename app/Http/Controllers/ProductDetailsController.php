<?php

namespace App\Http\Controllers;
use App\Cart;
use App\CartItem;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductDetailsController extends Controller{
  
    /* ==============simple index function to show up  =================*/

    public function index($id){
      $product=Product::find($id);
      $productDetails=DB::table('product_details')->where('product_id','=',$id)->get();
      $categories = Category::get();
      return view("cart.productdetails",compact('product','productDetails','categories'));
    }

    /* ============== Add element to the cart (mouloud) ================*/

    public function addItemToCart(Request $req){
      $id=$req->all()['id'];
      $product=Product::find($id);
      $cartItem= new CartItem;
      $exist=DB::table('carts')->where('user_id','=',\Auth::user()->id)->get();
      if ($exist->isEmpty()){ 
        $cart=new Cart;
        $cart->user_id =  \Auth::user()->id;
        $cart->save();
        $cartItem->cart_id=$cart->id;
      }else {
      $cartItem->cart_id=$exist->first()->id;
      }
      $cartItem->product_id=$id;
      $cartItem->quantity=$req->All()['Quantity'];
      $cartItem->price=$product->price;
      $cartItem->save();
      return redirect("/cart");
    }


}
