<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Shop;
class DashbaordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(){
    	$shop = Shop::find(1);
    	return view('admin.admin', compact('shop'));
    }


}
