<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use \App\Orders;
use \App\OrderItems;
use \Auth;
use App\Shop;
class PDFController extends Controller
{

    /**
     * Display the specified resource.
     * generating facture pdf 
     * by renken
     * @param  String $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $order = Orders::where('code','=',$code)->get()->first();

        if(!$order) {
        return redirect('home');
        }
        $shop = Shop::find(1);
        if (Auth::user()->groupId == 0 ) {
            $pdf = PDF::loadView('pdf.facture',compact('order','shop'));
        }
        else if (Auth::user()->id == $order->user->id) {
            $pdf = PDF::loadView('pdf.factureuser',compact('order','shop'));
        }
        else {
            return redirect('/home');
        }
        return $pdf->stream();
    }

}
