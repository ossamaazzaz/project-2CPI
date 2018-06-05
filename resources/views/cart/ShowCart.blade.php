@extends('layouts.appv2')
@section('title','SupperettecCom| Votre Panier')
@section('content')
<div class="container" style=" margin-left: auto; margin-right: auto;">
    <div class="row">
@if (sizeof($Items) > 0)
<!---------cart table------------>  
<div class="col-sm-8 card" style="margin-left: auto;margin-right: auto;padding: 10px;">
  <h2 style="text-align: center;">Mon panier</h2>
  <div class="table-responsive ">
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th>La marque</th>
          <th>Produit</th>
          <th>Prix</th>
          <th style="width: 200px">Quantité</th>
          <th>Totale</th>
          <th style="text-align: right;">supprimé</th>
        </tr>
      </thead>
      <tbody>
      <form method="POST" action="/cart" > @csrf   
      <!------------ Showing Items in the cart -------------->
      @foreach ($Items as $Item)
         <tr>
          <td>{{ $Item->product->brand }}</td>
          <td>{{ $Item->product->name }}</td>
          <td>{{ $Item->product->price }}</td>
          <td>
               <div class="row" style="width: 150px"> 
                      <div class="input-group number-spinner">
                        <span class="input-group-btn" ><button type="button" class="btn btn-default" data-dir="dwn"
                          onclick="quantity{{$Item->id}}.value=quantity{{$Item->id}}.value-1" style="background-color: #2d3436;color: white">
                          <span class="fa fa-minus" ></span></button></span>

                        <input id="{{'quantity'.$Item->id}}" type="text" class="form-control text-center"
                               value="{{$Item->quantity}}" name="{{'quantity'.$Item->id}}" >

                        <span class="input-group-btn"><button type="button" class="btn btn-default" data-dir="up"
                          onclick="quantity{{$Item->id}}.value=parseInt(quantity{{$Item->id}}.value)+1" style="background-color: #2d3436;color: white">
                          <span class="fa fa-plus"></span></button></span>
                      </div>
                </div>
          </td>
        
          <td>{{ $Item->price }}</td> <!-- improve it using <output> -->


          <td style="text-align: right;">
            <a onclick="this.parentElement.parentElement.remove()" href="/cart/delete/{{$Item->id}}" class="btn btn-danger a-btn-slide-text">
             <span class="fa fa-times" aria-hidden="true"></span>        
            </a>
          </td>
        </tr> 
      @endforeach
      <!---------------End Showing Items---------------->
      </tbody>
      <tfoot>
        <tr><strong>
          <th ></th>
          <th ></th>  
          <th ></th>
          <th> Totale  :</th>
          <th >{{$total}} DA</th>
        </strong></tr>
      </tfoot>
    </table>

          <a href="/home"><button type="button" class="btn btn-warning">revenir</button></a>
          <button type="submit" class="btn btn-primary">sauvgarder</a></form> 

          <form method="POST" action="/checkout">  
          <button type="submit" class="btn btn-success" style="float:right;">Check-Out</button>
          </form>


  </div>
</div>
@else
  <br>
  <center class="card" style="margin-left: auto;margin-right: auto;padding: 10px;">
  <h3>You have no items in your shopping cart</h3>
  <a href="{{ url('/home') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
  </center>
@endif  
</div>
</div>
@endsection