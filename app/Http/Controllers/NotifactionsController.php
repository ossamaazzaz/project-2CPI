<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class NotifactionsController extends Controller
{
    public function index(Request $req)
    {
    	$notifactions = Product::getnotifications();
    	return response()->json($notifactions);
    }
}
