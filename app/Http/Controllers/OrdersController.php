<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cart;
use \App\CartItem;
use \App\Orders;
use \App\OrderItem;
use \Auth;


class OrdersController extends Controller
{
    public function checkout(Request $request)
    {
 
        //Retrieve cart information
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+= $item->product->price * $item->quantity;
        }

        $order = new Orders();
        $order->total_paid= $total;
        $order->user_id=Auth::user()->id;
        $code = str_random((6));
        while(!Orders::where('code','=',$code)->get()->isEmpty()) {
            $code = str_random((6));
        }
        $order->code = $code;
        $order->save();

        foreach($items as $item){
            $orderItem = new OrderItem();
            $orderItem->order_id=$order->id;
            $orderItem->product_id=$item->product->id;
            $orderItem->quantity=$item->quantity;         
            $orderItem->save();
            CartItem::destroy($item->id);
    	}
        

        return redirect('orders/'.$order->id);
    }

    //==================================================================
 
    public function OrdersList(){
        $orders = Orders::where('user_id',Auth::user()->id)->get();
        $categories = \App\Category::get();
        return view('order.list',compact('orders','categories'));
    }
    
    public function index($id){

    	if($id == "last")
    		$order = Orders::where('user_id',Auth::user()->id)->first();
    	else
    		$order=Orders::find($id);
        $categories = \App\Category::get();
        return view('order.order',compact('order','categories'));
    }
 
    //==================================================================


}

