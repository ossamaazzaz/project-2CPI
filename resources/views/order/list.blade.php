@extends('layouts.app')

@section('content')

 <div class="card">
    <input type="hidden" id="orderid" name="">
    <div class="modal fade" id="deleteorderModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Deleting an order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="cmt"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="deleteOrders('user')">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Your past orders</h2>
        </div>
        <div class="col-md-6">
            <h2>Under Preparation orders</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-2">Id</th>
                    <th class="col-sm-4">Date</th>
                    <th class="col-sm-2"></th>
                </tr>
                </thead>
                @foreach($orders as $order)
                <!-- added if to test the state and show only the taked products-->
                    @if($order->state == 4)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td><a href="/orders/{{$order->id}}"> {{$order->created_at}}</a></td>
                            <td><a href="/orders/{{$order->id}}"><i class="fa fa-search-plus"></i></a></td>
                        </tr>
                    @endif
                @endforeach
 
            </table>
        </div>
         <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-2">Id</th>
                    <th class="col-sm-4">Date</th>
                    <th class="col-sm-2">Code</th>
                    <th class="col-sm-2">Details</th>
                    <th class="col-sm-2"></th>
                </tr>
                </thead>
                @foreach($orders as $order)
                    @if(($order->state == 1) || ($order->state == 3))
                    <tr id="row{{ $order->id }}">
                        <td>{{$order->id}}</td>
                        <td><a href="/orders/{{$order->id}}"> {{$order->created_at}}</a></td>
                        <td>{{ $order->code }}</td>
                        <td><a href="/orders/{{$order->id}}"><i class="fa fa-search-plus"></i></a></td>
                        <td><button class="btn btn-warning" data-toggle="modal" data-target="#deleteorderModal" onclick="wantdel({{ $order->id }})">Delete</button></td>
                    </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
 </div>
    
@endsection