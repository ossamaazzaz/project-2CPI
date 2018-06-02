<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
      //code
    }
    public function getRate(Request $req)
    {
      $rate=new Rate;
      $rate->user_id=\Auth::id();
      $rate->value=$req->rateValue;
      $rate->save();
      return back();
    }
}
