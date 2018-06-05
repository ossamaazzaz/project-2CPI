@extends('layouts.appv2')
@section('title','SupperetteCom| À propos de nous')
@section('content')
<div id="terms-page" class="container">
      <div class="breadcrumbs" style="margin-bottom: -45px;">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li class="active">Qui somme-nous?</li>
        </ol>
      </div> 
  	<div class="bg">
      <center><h1><strong>Qui somme-nous?</strong></h1></center>
    </div>

  <div class='constrain-width'>
    <div class='section'>
      <h2 style="weight:bold;" class='sub-heading section-heading'>Présentation de notre magasin</h3>
      <div class='constrain-width'>
        <p>&nbsp;&nbsp;{{$shop->description}}</p>
      </div>

      <h2 style="weight:bold;" class='sub-heading section-heading'>Contact</h3>
      <div class='constrain-width'>
        <p>&nbsp;&nbsp;Pour toute information, question ou réclamation, le client peut s’adresser du Samedi au Jeudi, de 9 h à 18 h au service Relations Clients de magasin.</p>
        <p>Ou nous contacter: <a href="/contactus">depuis ce lien!</a></p>
      </div>
  </div>
  </div>
</div>
<br><br><br>
@endsection
