<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Event;
use App\Events\OrderConfirmed;
use App\Orders;
class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(Request $req)
    {
    	$notifications = \Auth::user()->getNotificationsLimit(5);
    	return response()->json($notifications->toArray());
    }

    public function showMore(Request $req)  
    {   
        $notifications = \Auth::user()->getNotifications();
    	return response()->json($notifications->toArray());
    }
}
