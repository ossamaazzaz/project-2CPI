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
use App\Notifications\missingproduct;
use DB;
use ProductDetailsController;

use App\Events\OrderConfirmed;
use App\Events\MissingProducts;
class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
    * checkout function 
    * by kacem
    */
    public function checkout(Request $request)
    {
 
        //Retrieve cart information
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $items = $cart->cartItems;
        if (count($items)>0) {
            $total=0;
            foreach($items as $item){
                $total+= $item->product->price * $item->quantity;
            }

            $order = new Orders();
            $order->total_paid= $total;
            $order->user_id=Auth::user()->id;
            //Order's codification added by renken
            $code = 'CMD' . date('z') . sprintf('%03d', Orders::count());;
            while (!Orders::where('code','=',$code)->get()->isEmpty()) {
                $code = 'CMD' . date('z') . sprintf('%03d', Orders::count());;
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
        }else return redirect('cart');
    }

    /*
    * to view orders list
    * by kacem
    */
 
    public function OrdersList(){
        $orders = Orders::where('user_id',Auth::user()->id)->get();
        $categories = \App\Category::get();
        $shop = Shop::find(1);
        return view('order.list',compact('orders','categories','shop'));
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
        $shop = Shop::find(1);
        return view('order.order',compact('order','categories','shop'));
    }
 
    /*
    * to view orders list on admin page
    * by kacem
    */
    public function AdminPanel(){

        // pending, confirmeddeletion, asked
        $Pending_Orders = Orders::where('state',0)->orderBy('created_at')->get();

        $Accepted_Orders = Orders::where('state',1)->orderBy('created_at')->get();

        $Refused_Orders = Orders::where('state',2)->orderBy('created_at')->get();
        //aadded new table of the confirmation of the deleted orders ^^ by thehappybit
        $ConfirmDeletedOrders = Orders::where('state',5)->orderBy('created_at')->get();

        $askedOrders = Orders::where('state',8)->orderBy('created_at')->get();
  
        $categories = \App\Category::get();
        $shop = Shop::find(1);
        return view('admin.orders',compact('Pending_Orders','Refused_Orders','Accepted_Orders','categories','ConfirmDeletedOrders','askedOrders','shop'));

    }

    /**
    * Validation function
    * checking if the intems are ou of stock or not and depending on that its gives the admin
    * in case out of stock its gives admin option of refuse if not the order will e validated
    * by oussama messabih
    **/
    public function validateOrder(Request $req){
        $outOfStock = false;
        $id = $req->All()['id'];
        if ($id>=0) {
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
                    $item->state = "missing";
                    $item->save();
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
        if ($req->All()['id']>=0) {
            $id = $req->All()['id']; 
            $order = Orders::find($id);
            $order->state = 2;
            $order->save();
        }
    }
    /*
    * Send notification about the missing products to client 
    * ussing missingproduct notification 
    * by Oussama Messabih
    */
    public function missingProduct(Request $req){
        $id = $req->All()['id'];
        if ($id) {
            $order = Orders::find($id);
            if ($order) {
                $order->state = 8;
                $order->save();
                $order->notify(new missingproduct($order));
                event(new MissingProducts($order));
                return response()->json('asked');
            } else {
                return response()->json('fail');
            }
        }
    }
    /*
    * function to get the order items for float module
    * by Oussama Messabih
    */
    public function getMissingProducts(Request $req){
        $code  = $req->All()['code'];
        if ($code) {
            $order = Orders::where('code','=',$code)->first();
            if ($order) {

                    $Items = $order->orderItems;
                    $msproducts = array('');
                    $avproducts = array('');

                    foreach ($Items as $item) {
                        if ($item->state == 'missing') {
                            array_push($msproducts, Product::find($item->product_id));
                        } else {
                            array_push($avproducts, Product::find($item->product_id));
                        }
                    }
                    $products = array($msproducts,$avproducts);
                    return response()->json($products);
                    
            } else {
                return response()->json('noOrder');
            }
        } else {
            return response()->json('noCode');
        }
        
    }
    /*
    * Receive the confirmation of taking the order even some products are missing
    * will confirm the order directly
    * by Oussama Messabih
    */
    public function missingProductConfirm(Request $req){
        $code = $req->All()['code'];
        if ($code) {
            $order = Orders::where('code','=',$code)->first();
            if ($order) {
                if ($order->state == 0) {
                    $Items = $order->orderItems;
                    foreach ($Items as $item) {
                        if ($item->state == "missing") {
                            $item->delete();
                        }else{
                            $product = Product::find($item->product_id);
                            if ($product->quantitySale >= $item->quantity) {
                                $product->quantitySale = $product->quantitySale - $item->quantity;
                                $product->quantity = $product->quantity - $item->quantity;
                                $product->save(); 
                                }
                        }}
                $order->state = 1;
                $order->save();
                return response()->json($order->code . 'confirmed');
                }}
        } else {
            return response()->json('noCode');
        }
    }
    public function backToCart(Request $req){
        $code = $req->all()['code'];
        if ($code) {
            $order  = Orders::where('code',$code)->first();
            if ($order) {
                $Items = $order->orderItems;
                foreach ($Items as $item) {
                    if ($item->state == "missing") {
                        $item->delete();
                    }else{
                        $id = $item->product_id;
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
                        $cartItem->quantity=$item->quantity;
                        $cartItem->price=$product->price;
                        $cartItem->save();
                    }
                }
                $order->state = 7;
                $order->save();
                redirect("/cart");
            } else{
                return response()->json('notfound');
            }
        }
    }
    /*
    * Delete the order
    * delete an order of a missing products
    * by Oussama Messabih 
    */
    public function missingProductOrderDelete(Request $req){
        $code = $req->All()['code'];
        if ($code) {
            $order = Orders::where('code','=',$code)->first();
            if ($order) {
                $order->delete();
                return response()->json('deleted');
            } else {
                return response()->json('notdeleted');
            }
        }
    }
    /*
    * delete an order (archive)
    * deal with the client request of deleting an order
    * state 5 when client ask for deleting
    * state 6 when the adming confirm the deleting
    */
    public function deleteOrder(Request $req){
        $id  = $req->All()['id'];
        if ($id) {
            $order = Orders::find($id);
            $comment = $req->All()['comment'];
            $who = $req->All()['who'];
            if ($who == 'user') {
                $order->state = 5;
                $order->save();
                DB::table('orders_archive')->insert(['order_id' => $id, 'buyercomment' => $comment]);
            } elseif ($who == 'admin') {
                $order->state = 6;
                $order->save();
                $faultofwho = $req->All()['faultofwho'];
                if ($faultofwho != null) {
                    DB::table('orders_archive')->where('id', $id)->update(['sellercomment' => $comment,'faultofwho' => $faultofwho]);
                } else {
                    DB::table('orders_archive')->where('id', $id)->update(['sellercomment' => $comment]);
                }
                return response()->json($who);
            }
            
        }else{
            response()->json('fail');
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
            $dOrders = Orders::where('state',6)->orderBy('created_at')->get();
            return view('admin.preparation',compact('Orders','dOrders','shop'));

        } else if ($req->isMethod('post')){
            $id = $req->All()['id'];
            if ($id >= 0) {
                $order = Orders::find($id);
                if ($order->state != 3) {
                    $order->state = 3;
                    $order->save();
                    // send email notification 
                    $order = Orders::find($id);
                    $email = $order->user->email;
                    Mail::to($email)->send(new OrderDone($order));

                    $order->notify(new Confirmation($order));
                    event(new OrderConfirmed($order));

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
            $code = $req->All()['code'];

            if ($code!=null) {
            $order = Orders::where('code',$code)->get()->first();

            if ($order) {

                if ($order->state == 3) {

                $order->state = 4;
                $order->save();
                return response()->json('Valid');
                
                } else if ($order->state == 4) {
                    return response()->json('ard');
                } else {
                    return response()->json('notValid');
                }
            }else{
                    return response()->json('notValid');

            }
        }
        }
        $shop = Shop::find(1);
        return view('admin.checkCode',compact('shop'));
        }

        return redirect('/');
           
    }
    /*
    * Retrieved deleted Products to Stock
    * state 7 for retrieved products
    * by Oussama Messabih
    */
    public function retrieve(Request $req){
        $id = $req->all()['id'];
        if ($id>=0) {
            $order  = Orders::find($id);
            if ($order) {
                $Items = $order->orderItems;
                foreach ($Items as $item) {
                    $product = Product::find($item->product_id);
                    $product->quantitySale = $product->quantitySale + $item->quantity;
                    $product->quantity = $product->quantity + $item->quantity;
                    $product->save();
                }
                $order->state = 7;
                $order->save();
                return response()->json('retrieved');
            }else{
                return response()->json('notfound');
            }
        }
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

