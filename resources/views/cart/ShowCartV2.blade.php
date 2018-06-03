@extends('layouts.appv2')
@section('title','SupperetteCom| Votre Panier')


@section('content')
<section id="cart_items">
<div class="container">
      <div class="breadcrumbs" style="margin-bottom: -45px;">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li class="active">Shopping Cart</li>
        </ol>
      </div>    
   
<div class="table-responsive cart_info">

<table class="table table-condensed">
  <thead>
    <tr class="cart_menu">
      <td class="image">Produit</td>
      <td class="description">Description</td>
      <td class="price">Prix</td>
      <td class="quantity">Quantité</td>
      <td class="total">Totale</td>
      <td></td>
    </tr>
  </thead>

  <tbody>
    <form method="POST" action="/cart" >
    @foreach ($Items as $Item)
    <tr>
      <td class="cart_product">
        <a href=""><img style="height: 100px; width: 100px;" src="{{$Item->product->image}}" alt="{{$Item->product->name}}"></a>
      </td>
      <td class="cart_description">
        <h4><a href="">{{$Item->product->name}}</a></h4>
      </td>
      <td class="cart_price">
        <p>{{ $Item->price }}</p>
      </td>
      <td class="cart_quantity">
        <div class="row" style="width: 150px"> 
                      <div class="input-group number-spinner">
                        <span class="input-group-btn"><button type="button" class="btn btn-default" data-dir="dwn"
                          onclick="quantity{{$Item->id}}.value=quantity{{$Item->id}}.value-1">
                          <span class="fa fa-minus"></span></button></span>


                        <input id="{{'quantity'.$Item->id}}" type="text" class="form-control text-center"
                               value="{{$Item->quantity}}" name="{{'quantity'.$Item->id}}" >


                        <span class="input-group-btn"><button type="button" class="btn btn-default" data-dir="up"
                          onclick="quantity{{$Item->id}}.value=parseInt(quantity{{$Item->id}}.value)+1">
                          <span class="fa fa-plus"></span></button></span>
                      </div>
          </div>
      </td>
      <td class="cart_total">
        <p class="cart_total_price"></p>
      </td>
      <td >
        <a onclick="this.parentElement.parentElement.remove()" href="/cart/delete/{{$Item->id}}" class="btn btn-danger a-btn-slide-text">
             <span class="fa fa-times" aria-hidden="true"></span>        
            </a>
      </td>
    </tr>
    @endforeach
  </tbody>  

</table>
      </div>
    </div>
  </section> <!--/#cart_items-->

  <section id="do_action">
    <div class="container">
      
      <div class="row">
        <div class="col-sm-6" style="float: right">
          <div class="total_area">
            <ul>
              <li>Totale <span>{{$total}} DA</span></li>
            </ul>
              <button class="btn btn-default update" href="/home" style="background-color: #F13A;">Revenir Au Magasin</button>
              <button type="submit" class="btn btn-default update">Calculer</button></form>
              <form method="POST" action="/checkout">
              <button type="submit" class="btn btn-default check_out" style="float: right">Check Out</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#do_action-->
@endsection