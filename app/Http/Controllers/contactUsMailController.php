<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\contactUsMailing;
use App\contactUsMail;
use App\User;

class contactUsMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function sendMail(Request $req)
     {
         $adminEmail = User::find(1)->email;
         $contactMail = new contactUsMail;
         $contactMail->user_id  = \Auth::id();
         $contactMail->subject  = $req->all()['subject'];
         $contactMail->body     = $req->all()['body'];
         $contactMail->save();
         Mail::to($adminEmail)->send(new contactUsMailing($contactMail));
         return redirect('/');
     }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contactUsMail  $contactUsMail
     * @return \Illuminate\Http\Response
     */
    public function show(contactUsMail $contactUsMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contactUsMail  $contactUsMail
     * @return \Illuminate\Http\Response
     */
    public function edit(contactUsMail $contactUsMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contactUsMail  $contactUsMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactUsMail $contactUsMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contactUsMail  $contactUsMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactUsMail $contactUsMail)
    {
        //
    }
}
