@extends('layouts.appv2')
@section('title','SupperetteCom| Notre terms et conditions')
@section('content')
<div id="terms-page" class="container">
      <div class="breadcrumbs" style="margin-bottom: -45px;">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li class="active">Notre terms et conditions</li>
        </ol>
      </div> 
  	<div class="bg">
    	<div class="row">
    		<div class="col-sm-12">
				<h2 class="title text-center"><strong>Conditions Générales de vente</strong></h2>
        <h4 style="text-align:center; weight:bold;">
          Date de derniere modification:
          {{$shop->updated_at}}
        </h4>
        </div>
      </div>
    </div>

  <div class='constrain-width'>
    <div class='section'>
      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 1. Objet</h3>
      <div class='constrain-width'>
        <p>Les conditions générales de ventes décrites ci-après détaillent les droits et obligations de l’entreprise ELEARNING EDITIONS et de ses clients dans le cadre de la vente de formations et de cours en ligne.

        Toute prestation accomplie par la société ELARNING EDITIONS implique l’adhésion sans réserve de l’acheteur aux présentes conditions générales de vente.</p>
      </div>

      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 2. Présentation des produits</h3>
      <div class='constrain-width'>
        <p>Les caractéristiques des produits proposés à la vente sont présentées dans la rubrique « Boutique » et « Catalogue de formations » de notre site. Les photographies n’entrent pas dans le champ contractuel. La responsabilité de la société ELEARNING EDITIONS ne peut être engagée si des erreurs s’y sont introduites. Tous les textes et images présentés sur le site de la société ELARNING EDITIONS sont réservés, pour le monde entier, au titre des droits d’auteur et de propriété intellectuelle; leur reproduction, même partielle, est strictement interdite.</p>
      </div>

      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 3. Durée de validité des offres de vente</h3>
      <div class='constrain-width'>
        <p>Le suivi d’une formation à distance est valable pendant une durée de 12 mois à partir de la date d’inscription.</p>
      </div>

      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 4. Prix des produits</h3>
      <div class='constrain-width'>
        <p>Les rubriques « Boutique » et « Catalogue de formations » de notre site indiquent les prix en euros toutes taxes comprises. Le montant de la TVA est précisé lors de la sélection d’un produit par le client.
        La société ELEARNIONG EDITIONS se réserve le droit de modifier ses prix à tout moment mais les produits commandés sont facturés au prix en vigueur lors de l’enregistrement de la commande.
        Aucun escompte ne sera accordé en cas de paiement anticipé.</p>
      </div>

      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 5. Commandes</h3>
      <div class='constrain-width'>
        <p>Le client valide sa commande lorsqu’il active le lien  » Confirmez votre commande  » en bas de la page  » Récapitulatif de votre commande  » après avoir accepté les présentes conditions de vente. Avant cette validation, il est systématiquement proposé au client de vérifier chacun des éléments de sa commande; il peut ainsi corriger ses erreurs éventuelles.

        La société ELEARNING EDITIONS confirme la commande par courrier électronique; cette information reprend notamment tous les éléments de la commande et le droit de rétractation du client.

        Les données enregistrées par la société ELEARNING EDITIONS constituent la preuve de la nature, du contenu et de la date de la commande. Celle-ci est archivée par la société ELEARNING EDITIONS dans les conditions et les délais légaux; le client peut accéder à cet archivage en contactant le service Relations Clients.
        </p>
      </div>
      
      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 6. Modalités de paiement</h3>
      <div class='constrain-width'>
        <p>Le règlement des commandes s’effectue par chèque ou carte bancaire.</p>
      </div>

      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 7. Délai de rétractation</h3>
      <div class='constrain-width'>
        <p>Le droit de rétractation ne s’applique pas à l’achat de cours ou de formations en ligne (vous renoncez à votre droit de rétractation pour le contenu numérique fourni sur un support immatériel dont l’exécution a commencé avec votre accord https://www.service-public.fr).</p>
      </div>

      <h3 style="text-align:center; weight:bold;" class='sub-heading section-heading'>Article 10 Relations clients – Service après-vente</h3>
      <div class='constrain-width'>
        <p>Pour toute information, question ou réclamation, le client peut s’adresser du Samedi au Jeudi, de 9 h à 18 h au service Relations Clients de magazin.</p>

        <p>Ou nous contacter: <a href="/contactus">depuis ce lien!</a></p>
      </div>
  </div>
  </div>
</div>
<br><br><br>
@endsection
