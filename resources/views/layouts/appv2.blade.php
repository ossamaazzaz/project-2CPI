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
    <!-- intro.js css import-->
    <link href="{{ asset('css/introjs.css') }} " rel="stylesheet">
    <!--comments css -->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top" ><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="" ><i class="fa fa-phone" ></i> +213 22 22 22</a></li>
								<li><a href="" ><i class="fa fa-envelope"></i> E-Shop@esi-sba.dz</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header-middle"><!--header-middle-->
			<div class="col-sm-13">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							@if(!$shop)
							<a href="index.html"><img src="{{ $shop->logo }}" alt="" /></a>
							@endif
						</div>
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								@if (Auth::guest())
				                    <li><a class="nav-link" href="{{ route('login') }}">
				                    	<i class="fa fa-sign-in"></i>&nbsp;Connecter
				                    </a></li>
				                        <li><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user"></i>&nbsp;Register</a></li>
				                @else
				                	<li><a class="nav-link dropdown-toggle" href="/home/edit"><i class="fa fa-user"></i> Compte</a></li>
				                	<li><a class="nav-link dropdown-toggle" href="/wishlist"><i class="fa fa-star"></i> Favories</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
				                	<li><a href="/cart" class="active"><i class="fa fa-shopping-cart"></i> Panier</a></li>
				                	@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		<nav class="navbar navbar-default navbar-back-color" role="navigation">
		<div class="container" style="padding-right: 0px;padding-left: 0px; ">
			

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/home">Home</a></li>
					<li class="dropdown"><a href="#">Categories<i class="fa fa-angle-down"></i></a>
	                    <ul role="menu" class="sub-menu">
	                    	@foreach($categories as $category)
	                        <li><a href="">{{$category->name}}</a></li>
	                        @endforeach
	                    </ul>
                    </li> 
					<li><a href="/contact">Contact</a></li>
					<li><a href="/contact">termes et conditions</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					   
					@if (!Auth::guest())

						<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><b class="caret"></b></a>
						<ul class="dropdown-menu" id="notif-dropdown">
						@if((!Request::is('home/edit','login','register','password/reset')))
                          @foreach ($notifications as $notif)
                            @if($notif != null)
                            <li>
                              <div class="notif">
                                @if($notif->type == 'missingproduct')
                                  <a onclick="getmissingproduct('{{ $notif->data }}')">there is a missing products on your order : {{ $notif->data }} <br> click to confirm or delete ! </a>
                                @else
                                  <a href="{{ 'facture/' . $notif->data }}"> Your code is : {{ $notif->data }}</a>
                                @endif
                              </div>
                              <hr>
                            </li>
                            @endif
                          @endforeach
                          @endif
						</ul>
					</li>
					<li style="margin-top: 7px;">

						<a href="/home/edit" style="color: white;display: inline;">
                        	{{ Auth::user()->firstName . " " .Auth::user()->lastName }}
                        </a>
                        <img src="{{ asset('photodeprofile.jpg') }}" height="40px" width="40px" style="border-radius: 50%;">

                                    

						
					</li>
					<li style="font-size: 15px;color: white">
						<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>&nbsp;logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     	</form>
                                  </a>
						
					</li>
                   

				</ul>
				<div class="col-sm-3" style="margin-top: 7px;float: right;">
					<form method="GET" action="/search" >
						<div class="search_box pull-right">
							<input id="term" name="term" type="text" value="" placeholder="Enter here" aria-describedby="ddlsearch"/>
							<button class="btn btn-default hidden" type="submit"></button>
						</div>
						<dev class="dropdown">
							<a data-toggle="dropdown"><i class="fa fa-bars"></i><b class="caret"></b></a>
							<label id="chosed"><input type="text" id="category" name="category" hidden="true" value=""></label>
							<ul class="dropdown-menu" id="selectedCategory">
								@foreach($categories as $cat)
									<li><a id="{{ $cat->id }}" onclick="selectedCategory(this)">{{ $cat->name }}</a></li>
								@endforeach
							</ul>
						</dev>
					</form>
				</div>
                 @endif
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
	@if (!Auth::guest())
	<input type="hidden" id="userId" name="userId" value="{{ Auth::user()->id }}">
	@else
	<input type="hidden" id="userId" name="userId" value="noId">
	@endif
	</footer>
  	
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
    <script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
  	<script src="{{ asset('js/intro.js') }}"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('js/notifications.js')}}"></script>
</body>
</html>
