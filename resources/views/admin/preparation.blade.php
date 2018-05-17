<!--  /*
Orders
*/
-->
@extends('layouts.dashboard')
@section('page_heading','Orders Manager')
@section('section')
<div class="col-sm-50"> 
<div class="row">
            <div class="col-sm-10">

<!--  /* Pending table */ --> 

            @section ('atable_panel_body')
            @include('widgets.preparationOrdersTable', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))
<!-- Deleted Orders -->
            @include('widgets.deletedOrdersTable', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))
            
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
        </div>
    </div>
</div>
@stop