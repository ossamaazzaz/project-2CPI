<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cart;
use \App\CartItem;
use \App\Orders;
use \App\OrderItem;
use App\Product;
use App\Shop;
use \Auth;
use Illuminate\Support\Facades\Mail;
use \App\Mail\OrderDone;
use App\Notifications\Confirmation;

class OrdersController extends Controller
{
    /*
    * checkout function 
    * by kacem
    */
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

    /*
    * to view orders list
    * by kacem
    */
 
    public function OrdersList(){
        $orders = Orders::where('user_id',Auth::user()->id)->get();
        $categories = \App\Category::get();
        return view('order.list',compact('orders','categories'));
    }
    /*
    * to view an order
    * by kacem
    */
    public function index($id){

    	if($id == "last")
    		$order = Orders::where('user_id',Auth::user()->id)->first();
    	else
    		$order=Orders::find($id);
        $categories = \App\Category::get();
        //added this line to get notifications
        $notifications = Product::getnotifications();
        return view('order.order',compact('order','categories','notifications'));
    }
 
    /*
    * to view orders list on admin page
    * by kacem
    */
    public function AdminPanel(){

        $Pending_Orders = Orders::where('state',0)->orderBy('created_at')->get();

        $Accepted_Orders = Orders::where('state',1)->orderBy('created_at')->get();

        $Refused_Orders = Orders::where('state',2)->orderBy('created_at')->get();

  
        $categories = \App\Category::get();
        $shop = Shop::find(1);
        return view('admin.orders',compact('Pending_Orders','Refused_Orders','Accepted_Orders','categories','shop'));
    }

    /**
    * Validation function
    * checking if the intems are ou of stock or not and depending on that its gives the admin
    * in case out of stock its gives admin option of refuse if not the order will e validated
    * by oussama messabih
    **/
    public function validateOrder(Request $req){
        $outOfStock = false;
        if ($req->id>=0) {
            $id = $req->id; 
            $order = Orders::find($id);
            //calcule
            $Items = $order->orderItems;
            foreach ($Items as $item) {
                $product = Product::find($item->product_id);
                if ($product->quantitySale >= $item->quantity) {
                    $product->quantitySale = $product->quantitySale - $item->quantity;
                    $product->quantity = $product->quantity - $item->quantity;
                    $product->save();
                    $order->state  = 1;
                } else {
                    $outOfStock = true;
                    break;
                }
            }
            $order->save();

        }
        if ($outOfStock) {
            return response()->json('refuse');  
        } else {
            return response()->json('validate');
        }
        
    }
    /**
    * in case its out of stock so the admin have one option is refuse
    * puting state on 2 mean refused order
    * by oussama messabih
    **/
    public function refuseOrder(Request $req){
        if ($req->id>=0) {
            $id = $req->id; 
            $order = Orders::find($id);
            $order->state = 2;
            $order->save();
        }
    }

    /**
    * Preparation confirmation function 
    * post function : puting state on 3 when preparation  is done
    * get function : just get the validated orders
    * by oussama messabih
    **/
    public function confirm(Request $req){
        if (\Auth::user()->groupId != 0 && \Auth::user()->groupId != 2 ) return redirect('/');
        if ($req->isMethod('get')) {
            $Orders = Orders::where('state',1)->orderBy('created_at')->get();
            $shop = Shop::find(1);
            return view('admin.preparation',compact('Orders','shop'));
        } else if ($req->isMethod('post')){
            if ($req->id >= 0) {
                $id = $req->id; 
                $order = Orders::find($id);
                if ($order->state != 3) {
                    $order->state = 3;
                    $order->save();
                    // send email notification 
                    $order = Orders::find($id);
                    $email = $order->user->email;
                    Mail::to($email)->send(new OrderDone($order));

                    $order->notify(new Confirmation($order));
                    return response()->json('confirmed');
                } else {
                    return response()->json('notconfirmed');
                }    
            }
        }
    }

    /**
    * Check order hash code function
    * puting state 4 when the client took his orders
    * checking code
    * by oussama messabih
    **/
    public function check(Request $req){
        if (\Auth::user()->groupId == 0 || \Auth::user()->groupId == 2 ) {
            if ($req->isMethod('post')) {
            $code = $req->code;
            if ($code!=null) {
            $order = Orders::where('code',$code)->get()->first();
            if ($order->state == 3) {
                $order->state = 4;
                $order->save();
                return response()->json('Valid');
            } else if ($order->state == 4) {
                return response()->json('ard');
            }
            else {
                return response()->json('notValid');
            }
        }
        }
        $shop = Shop::find(1);
        return view('admin.checkCode',compact('shop'));
        }

        return redirect('/');
           
    }


    /**
    * From the request, you must extract the order + the email.
    * to view the email template `views/email/orderDone.blade.php`
    * to view the Mailable class `app/Mail/OrderDone.php`
    * by renken 
    */
    public function notifyOnDone($id) {
            
        $order = Orders::find($id);
        $email = $order->user_id;
        // dd($email);
        Mail::to($email)->send(new OrderDone($order));
        return view('/');
    }
}

