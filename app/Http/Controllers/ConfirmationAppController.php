<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Mail\OrderDone;
use App\Notifications\Confirmation;
use App\Notifications\missingproduct;
use App\Events\OrderConfirmed;
use App\Events\MissingProducts;
use App\Product;
class ConfirmationAppController extends Controller
{
    public function confirmApp(Request $req){
    if ($req->isMethod('get')) {
        $Orders = Orders::where('state',1)->orderBy('created_at')->get();
        $dOrders = Orders::where('state',6)->orderBy('created_at')->get();
        return ['Orders' => $Orders,'dOrders' => $dOrders];
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

                return response()->json('confirmed');
            } else {
                return response()->json('notconfirmed');
            }    
        }
    }
	}
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
}
