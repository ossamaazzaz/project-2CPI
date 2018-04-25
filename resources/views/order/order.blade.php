@extends('layouts.app')

@section('content')
<div class="container" style=" margin-left: auto; margin-right: auto;">
    <div class="row">

<!---------cart table------------>  
<div class="col-sm-8 card" style="margin-left: auto;margin-right: auto;padding: 10px;">
  <h2 style="text-align: center;">Your Last Order</h2>
  <div class="table-responsive ">
    <table class="table">
      <thead>
        <tr>
          <th>Brand</th>
          <th>Item</th>
          <th>Price</th>
          <th style="width: 200px">Quantity</th>
          <th>Item Total Price</th>

        </tr>
      </thead>
      <tbody>
      <form method="POST" action="/cart" > @csrf   
      <!------------ Showing Items in the cart -------------->
      @foreach ($order->orderItems as $Item)
         <tr>
          <td>{{ $Item->product->brand }}</td>
          <td>{{ $Item->product->name }}</td>
          <td>{{ $Item->product->price }}</td>
          <td>{{ $Item->quantity }}</td>
        
          <td>{{ $Item->product->price * $Item->quantity }}</td> <!-- improve it using <output> -->
        </tr> 
      @endforeach
      <!---------------End Showing Items---------------->
      </tbody>
      <tfoot>
        <tr><strong>
          <th ></th>
          <th ></th>  
          <th ></th>
          <th> Total  :</th>
          <th >{{$order->total_paid}} DA</th>
        </strong></tr>
      </tfoot>
    </table>

          <a href="/home"><button type="button" class="btn btn-default">Back To Store </button></a>
          <a href="/facture/{{ $order->code }}"><button type="button" class="btn btn-warning">Download PDF file</button></a>
          <a href="/home"><button type="button" class="btn btn-info">Get this as E-mail</button></a>

      </form>

  </div>
</div> 
</div>
</div>
@endsection