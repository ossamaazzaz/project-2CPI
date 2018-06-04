<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rate;
use App\Product;
class RateController extends Controller
{
    /**
     * to get check if the user rated that product or not.
     * Oussama Messabih
     * @return Response
     */
    public function index(Request $req)
    {
        $id = $req->all()['id'];
        $r = Rate::where('user_id',\Auth::id())->where('product_id',$id)->get();
        if ($r->count()>0) {
            return response()->json('rated');
        }
    }

    /**
     * to create a rate when a user rate a product
     * Oussama messabih
     * @return Response
     */
    public function create(Request $req)
    {
        if ($req->all()['rating']>0) {
            $id = $req->all()['id'];
            $r = Rate::where('user_id',\Auth::id())->where('product_id',$id)->get();
            if ($r->count()>0) {
                return response()->json('ratedbefore');
            }else{
                $rate = new Rate;
                $rate->user_id = \Auth::id();
                $rate->product_id = Product::find($id)->id;
                $rate->rate = $req->all()['rating'];
                $rate->save();
                return response()->json('rated');
            }
        }
        
    }


}
