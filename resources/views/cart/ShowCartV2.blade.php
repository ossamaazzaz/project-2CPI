@extends('layouts.appV2')
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
    @foreach ($items as $Item)
    <tr>
      <td class="cart_product">
        <a href=""><img style="height: 100px; width: 100px;" src="{{$Item->product->image}}" alt="{{$Item->product->name}}"></a>
      </td>
      <td class="cart_description">
        <h4><a href="">{{$Item->product->name}}</a></h4>
        <p>Web ID: 1089772</p>
      </td>
      <td class="cart_price">
        <p>$59</p>
      </td>
      <td class="cart_quantity">
        <div class="cart_quantity_button">
          <a class="cart_quantity_up" href=""> + </a>
          <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
          <a class="cart_quantity_down" href=""> - </a>
        </div>
      </td>
      <td class="cart_total">
        <p class="cart_total_price">$59</p>
      </td>
      <td class="cart_delete">
        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
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
              <li>Totale <span>$61</span></li>
            </ul>
              <a class="btn btn-default update" href="" style="background-color: #F13A;">Revenir Au Magasin</a>
              <a class="btn btn-default update" href="">Calculer</a>
              <a class="btn btn-default check_out" href="" style="float: right">Check Out</a>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#do_action-->
@endsection