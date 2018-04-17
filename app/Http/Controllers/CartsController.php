<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cart;
use \App\CartItem;
use App\Category;
class CartsController extends Controller
{
	/* ========================= Show the cart (Kacem )==========================*/
    public function ShowCart()  {

        $cart = Cart::where('user_id',\Auth::id())->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=\Auth::id();
            $cart->save();
        }

        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
        	$item->price = $item->product->price * $item->quantity;
            $total+=$item->price;
        }
        $categories = Category::get();
        return view('cart.ShowCart' ,['Items'=>$items,'total'=>$total ,'categories' => $categories]);
    }

	/* ========================= Edit the cart (Kacem)==========================*/

    public function UpdateCart(Request $req)
    {
        $input = $req->post();


        $cart = Cart::where('user_id',\Auth::id())->first();
        $items = $cart->cartItems;

        foreach($items as $item){
            $item->quantity = intval($input['quantity'.$item->id]);
            $item->save();
        }


        return redirect('cart');
    }

    /* ============= Remove an element from cart (mouloud) ============*/

    public function RemoveItem($id){
        CartItem::find($id)->delete();
        return redirect('/cart');
    }

}
