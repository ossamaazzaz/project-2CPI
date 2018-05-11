@extends('layouts.dashboard')

@section('section')
<div class="card" style="height: 180px;">
<center><h2>Enter the code here :</h2></center><br>
<div class="register">
  <div class="field">
    <input id="register" maxlength="6" type="text"  autocomplete="off" />
    <button onclick="check()">CHECK</button>
  </div>
</div>
</div>
<div class="card">
    <div class="alert alert-success fadeIn" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Order exists !</strong>&nbsp;and here is the PDF file
    </div>
    <div class="alert alert-danger fadeIn" id="order-no-exists" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Order doesn't exist !</strong>
    </div>
    <iframe src="{{ asset('TP7.pdf') }}" style="min-height: 600px"></iframe>
</div>


<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Code :') }}</div>
                <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="codeinput" type="code" class="form-control" name="code" placeholder="entry code of the product here" required autofocus>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" onclick="check()">Check</button>
                        <label class="text-md-right"></label>
                        <label class="text-justify" id="validationMsg"></label>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
