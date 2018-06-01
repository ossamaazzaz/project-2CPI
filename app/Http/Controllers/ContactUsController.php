<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
      public function index(){
         $notifications = Product::getnotifications();
         return view('Contact.ContactUs',compact("notifications"));
      }
}
