<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatabes.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}"> 

   <title> Cart</title>
</head>

<body>

@if (sizeof($Items) > 0)
<!---------cart table------------>  
<div class="col-sm-8">
  <h2 style="text-align: center;">Cart Table</h2>
  <div class="table-responsive ">
    <table class="table">
      <thead>
        <tr>
          <th>Brand</th>
          <th>Item</th>
          <th>Price</th>
          <th style="width: 200px">Quantity</th>
          <th>Total</th>
          <th style="text-align: right;">Delete</th>
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
                        <span class="input-group-btn"><button type="button" class="btn btn-default" data-dir="dwn"
                          onclick="quantity{{$Item->id}}.value=quantity{{$Item->id}}.value-1">
                          <span class="glyphicon glyphicon-minus"></span></button></span>


                        <input id="{{'quantity'.$Item->id}}" type="text" class="form-control text-center"
                               value="{{$Item->quantity}}" name="{{'quantity'.$Item->id}}" >


                        <span class="input-group-btn"><button type="button" class="btn btn-default" data-dir="up"
                          onclick="quantity{{$Item->id}}.value=parseInt(quantity{{$Item->id}}.value)+1">
                          <span class="glyphicon glyphicon-plus"></span></button></span>
                      </div>
                </div>
          </td>
        
          <td>{{ $Item->price }}</td> <!-- improve it using <output> -->


          <td style="text-align: right;">
            <a onclick="this.parentElement.parentElement.remove()" href="#" class="btn btn-danger a-btn-slide-text">
             <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>        
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
          <th> Total  :</th>
          <th >{{ $total }} DA</th>
        </strong></tr>
      </tfoot>
    </table>

          <button type="button" class="btn btn-warning">Back To Store </button>
          <button type="submit" class="btn btn-primary">Apply Changes and refresh</a></form> 
          <button type="button" class="btn btn-success" style="float:right;">Check Out </button>

  </div>
</div>
@else
  <br>
  <center>
  <h3>You have no items in your shopping cart</h3>
  <a href="{{ url('/home') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
  </center>
@endif  

</body>

</html>
 <!-- Scripts -->

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/datatables.min.js') }}"></script>
  <script src="{{ asset('js/datatables-init.js') }}"></script>
