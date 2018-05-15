<!--  /*
Orders
*/
-->
@extends('layouts.dashboard')
@section('page_heading','Orders Manager')
@section('section')
<div class="col-sm-50"> 
<div class="row">
            <div class="col-md-12">
            

<?php  /* Pending table */ ?> 

            @section ('atable_panel_title','From here you can manage all users orders')
            @section ('atable_panel_body')
            @include('widgets.pendingTable', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))

<!--  /* Deleted table */ -->       

            @include('widgets.askedOrders', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))

<!--  /* Deleted table */ -->       

            @include('widgets.deleteOrdersConfirmation', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))

<!--  /* Accepted table */ -->       

            @include('widgets.AcceptedTable', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))



<!-- /* Refused table */ -->       

            @include('widgets.RefusedTable', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))
            
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'atable'))

        </div>
    </div>
</div>
@stop