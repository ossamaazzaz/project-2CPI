<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use \App\Orders;
use \App\OrderItems;
use \Auth;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

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
        if (Auth::user()->groupId == 0 ) {
            $pdf = PDF::loadView('pdf.facture',compact('order'));
        }
        else if (Auth::user()->id == $order->user->id) {
            $pdf = PDF::loadView('pdf.factureuser',compact('order'));
        }
        else {
            return redirect('/home');
        }
        return $pdf->stream();
    }

}
