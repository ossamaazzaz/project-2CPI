<!--  /*
Orders
*/
-->
@extends('layouts.dashboard')
@section('title','Orders')
@section('page_heading','Orders Manager')
@section('section')
<div class="col-sm-50"> 
<div class="row">
            <div class="col-md-12">
            

<!--  /* Pending table */ --> 

            @section ('atable_panel_title','From here you can manage all users orders')
            @section ('atable_panel_body')
            @include('widgets.pendingTable')

<!--  /* Deleted table */ -->       

            @include('widgets.askedOrders')

<!--  /* Deleted table */ -->       

            @include('widgets.deleteOrdersConfirmation')

<!--  /* Accepted table */ -->       

            @include('widgets.AcceptedTable')



<!-- /* Refused table */ -->       

            @include('widgets.RefusedTable')
            
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'atable'))

        </div>
    </div>
</div>
@stop