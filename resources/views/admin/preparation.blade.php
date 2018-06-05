<!--  /*
Orders
*/
-->
@extends('layouts.dashboard')
@section('page_heading','Préparation')
@section('title','Préparation')
@section('section')
<div class="col-md-12"> 
<div class="row">
            <div class="col-md-12">

<!--  /* Pending table */ --> 

            @section ('atable_panel_body')
            @include('widgets.preparationOrdersTable')
<!-- Deleted Orders -->
            @include('widgets.deletedOrdersTable')
            
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
        </div>
    </div>
</div>
@stop