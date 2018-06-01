<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home </title>
    <link href="{{ asset('css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }} " rel="stylesheet">

    <link href="{{ asset('css/prettyPhoto.css') }} " rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }} " rel="stylesheet">
    <link href="{{ asset('css/animate.css') }} " rel="stylesheet">
	<link href="{{ asset('css/main.css') }} " rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }} " rel="stylesheet">
    <!--comments css -->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

</head><!--/head-->
<body>
	<header>
		<nav class="navbar navbar-default" role="navigation" style=" margin-bottom: 0px;">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-right:0px !important;">
		      <ul class="nav navbar-nav" style="height: 75px;">
		        <li class="pull-left"><a href="#"><img src="{{asset('logo2.png')}}" id="main-logo"></a></li>
		        <li class="active">
		        	<a href="/home" style="margin-left: -155px;">Accueil</a>
		        </li>
		        <li class="dropdown">
					  <a class="dropdown-toggle" type="button" data-toggle="dropdown" style="margin-left: -43px;">Categories
					  <span class="caret"></span></a>
					  <ul class="dropdown-menu">
					    @foreach($categories as $category)
                        	<li><a href="/search?category={{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
					  </ul>
			      </li>
		        <li><a href="/contactus">Contactez-nous</a></li>
		        <li><a href="">A propos</a></li>
		        @if (Auth::guest())
		        <li class="pull-right" style="margin: 2px 0px 0 0;font-size: 16px">
		        	<a href="{{ route('login') }}">
			        <i class="fa fa-user"></i>&nbsp;&nbsp;Connecter / s'inscrire
			        </a>
			    </li>
			    @else
			    <li class="pull-right" style="margin: -10px 40px 0 0">
			    	<a class="dropdown-toggle" type="button" data-toggle="dropdown" ><img src="{{ asset('photodeprofile.jpg') }}" height="50px" width="50px" style="border-radius: 50%;">
					  <span class="caret"></span></a>
					  <ul class="dropdown-menu">
                        	<li><a href="/edit">
                        		<i class="fa fa-pencil"></i>&nbsp;Modifier profile
                        	</a></li>
                        	<li><a href="/cart">
                        		<i class="fa fa-shopping-cart"></i>&nbsp;Panier
                        	</a></li>
                        	<li class="divider"></li>
                        	<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        		<i class="fa fa-sign-in"></i>&nbsp;logout
                        		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                </form>
                        	</a></li>
					  </ul>
			    </li>
			    <li class="pull-right dropdown" style="margin: -20px 0px 0 0">
                  <a class="nav-link text-light" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div id="ex4">
					  <span class="p1 fa-stack fa-2x has-badge" data-count="4">
					    <i class="p3 fa fa-bell-o fa-stack-1x xfa-inverse" data-count="4b"></i>
					  </span>
					</div>
                  </a>
                    <ul class="dropdown-menu" style="max-height:500px;overflow-y: scroll;overflow-x:hidden; ">
                    	
                      <li class="head text-light" >
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12">
                            <span>Notifications ({{count($notifications)}})</span>
                          </div>
                      </li>
                      <li class="divider"></li>
                      @if((!Request::is('home/edit','login','register','password/reset')))
                      @if(count($notifications) == 0)
                      <li class="notification-box" style="width: 400px; "> 
                        <div class="row">  

                          <div class="col-lg-12 col-sm-12 col-12">  
                            <div>
                           		Il n'y a pas de notification !
                            </div>
                          </div>    
                        </div>
                      </li>
                      <li class="divider"></li>
                      @else
                          @foreach ($notifications as $notif)
                            @if($notif != null)
                      <li class="notification-box" style="width: 400px; ">
                      	<strong class="text-info">hehehe</strong> 
                        <div class="row">  

                          <div class="col-lg-12 col-sm-12 col-12">
                            
                            <div>
                              @if($notif->type == 'missingproduct')
                                  <a onclick="getmissingproduct('{{ $notif->data }}')">there is a missing products on your order : {{ $notif->data }}<br>click to confirm or delete ! </a>
                                @else
                                  <a href="{{ 'facture/' . $notif->data }}">Your code is : {{ $notif->data }}</a>
                                @endif
                            </div>
                            <small class="text-warning">01.06.2018, 08:29</small>
                          </div>    
                        </div>
                      </li>
                      <li class="divider"></li>
                      @endif
                      @endforeach
                      @endif
                      @endif
                      <li class="footer bg-dark text-center">
                        <a href="" class="text-light">View All</a>
                      </li>
                    </ul>
                </li>
			    @endif
		        <li class="pull-right" style="margin: 16px 0px 0 0;"> 
		        	<div class="cntr">
						<div class="cntr-innr">
							<form>
						  <label class="search" for="inpt_search">
								<input id="inpt_search" type="text" onmouseout="this.value='';this.blur();" />
							</label>
							</form>
						</div>
					</div>
		        </li>
		       
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</header>
	<!--success message-->
    @if(session('success'))
      <div class="container">
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      </div>
    @endif

    <!--error message-->

    @if(session('error'))
      <div class="container">
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      </div>
    @endif


    @yield('content')

		<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>7anoo</span>Tech</h2>
							<p>plateforme de vente à distance partielle adaptée aux contraintes du marché Algérien</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Video 1</p>
								<h2>Présentatif</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Video 2</p>
								<h2>Présentatif</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Video 3</p>
								<h2>Présentatif</h2>
							</div>
						</div>
						
			
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>Ecole Nationale Superieur En Informatique Esi-Sba </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								
								<li><a href="">Contact Us</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p >Copyright © 2018 E-SHOP All rights reserved for 7anooTech</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

  	<!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables-init.js') }}"></script>
    <script src="{{ asset('js/th3hpbt.js')}}"></script>
    <script src="{{ asset('js/searchresult.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
	<script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script type="text/javascript">

    	$("#inpt_search").on('focus', function () {
		$(this).parent('label').addClass('active');
		});

		$("#inpt_search").on('blur', function () {
			console.log("great");
			if($(this).val().length == 0)
				$(this).parent('label').removeClass('active');

		});
    </script>


</body>
</html>