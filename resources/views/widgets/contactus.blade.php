@extends('layouts.appv2')
@section('title','SupperetCom| Contact')
@section('content')
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contacez <strong>Nous</strong></h2>    			    				    				
					
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Rester En Contact</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="POST" action="{{ action('contactUsMailController@sendMail') }}">
                  @csrf
				            <div class="form-group col-md-12">
				                <input id="subject "type="text" name="subject" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}"  placeholder="Sujet" required autofocus>
                        @if ($errors->has('subject'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
				            <div class="form-group col-md-12">
				                <textarea name="body" id="body"  class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" rows="8" placeholder="Vos Message Ici" required autofocus></textarea>
                        @if ($errors->has('body'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Envoyer">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shop</p>
							<p>Ecole National Superieur en Informatique Esi-Sba</p>
							<p>Sidi Bel abbés</p>
							<p>Mobile: +213 22 22 22</p>
							<p>Fax: +213 22 22 22</p>
							<p>Email: E-Shop@esi-sba.dz</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>

							</ul>
	    				</div>
	    			</div>
    			</div>
	    	</div>
    	</div>
    </div><!--/#contact-page-->

@endsection
