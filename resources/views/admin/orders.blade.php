<!--  /*
Orders
*/
-->
@extends('layouts.dashboard')
@section('page_heading','Orders Manager')
@section('section')
<div class="modal fade" id="adminDeleteorderModal" tabindex="-1" style="z-index: 999999999;" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deleting an order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>The mistake of who ?</label>
        <div class="radio">
          <label><input type="radio" id="sellerRadio" name="optradio">Seller mistake</label>
        </div>
        <div class="radio">
          <label><input type="radio" id="buyerRadio" name="optradio">Buyer mistake</label>
        </div>
        <label for="cmt">Comment:</label>
        <textarea class="form-control" rows="5" id="cmt"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="deleteOrders('admin')">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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