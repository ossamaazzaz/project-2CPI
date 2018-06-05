@extends('layouts.dashboard')
@section('title','Vérifier commandes')
@section('page_heading','Vérifier commandes')
@section('section')
<div class="card" style="height: 180px;">
<center><h2>Entrer le code ici: </h2></center><br>
<div class="register">
  <div class="field">
    <input id="codeinput" maxlength="9" type="text"  autocomplete="off" />
    <button onclick="check()">Vérifier</button>
  </div>
</div>
</div>
<div class="card">
    <div id="validMsg" class="alert alert-success fadeIn hidden" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Commande existe</strong>&nbsp;Le PDF ci-dessous
    </div>
    <div id="notValidMsg" class="alert alert-danger fadeIn hidden" id="order-no-exists" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Commande n'existe pas</strong>
    </div>
    <iframe id="pdfSource" class="hidden" style="min-height: 600px"></iframe>
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
