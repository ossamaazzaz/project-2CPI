<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-COM</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
{{--     <link rel="stylesheet" type="text/css" href="{{ asset('css/searchresult.css') }}>
 --}}</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'E-com') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <form class="navbar-nav mr-auto" method="GET" action="/home/search">
                      <ul class="navbar-nav">
                        @if(Request::url()=='/home/search') <li><input id="term" name="term" type="text" value="{{ $term }}" placeholder="Enter here" aria-describedby="ddlsearch" style="width: 300px;height: 40px; margin: 3px;"></li> @else <li><input id="term" name="term" type="text" value="" placeholder="Enter here" aria-describedby="ddlsearch" style="width: 300px;height: 40px; margin: 3px;"></li> @endif
                        
                        <li><div id="dropdownMenu" class="dropdown">
                            <button class="btn fa fa-bars" type="button" data-toggle="dropdown" style="height: 40px;">
                            <span class="caret"></span>
                            @if(Request::url()=='/home/search') <label id="chosed"><input type="text" id="category" name="category" hidden="true" value="{{ $category->id }}"></label> @else <label id="chosed"><input type="text" id="category" name="category" hidden="true" value=""></label> @endif
                              </button>
                            <div class="dropdown-menu" id="selectedCategory">
                              @foreach ($categories as $cat)
                                  <option class="dropdown-item" id="{{ $cat->id }}" onclick="selectedCategory(this)">{{ $cat->name }}</option>
                              @endforeach
                            </div>
                            </div> 

                        </li>
                        <li>
                          <div class="input-group-btn" style="height: 40px;margin: 3px;">
                            <button class="btn btn-default" type="submit" style="background-color: DodgerBlue;color: white;">
                              <i  class="fa fa-search" aria-hidden="true"></i>
                            </button>
                      </div>
                        </li>
                      
                    </div>
                      </ul>
                    </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @if (Auth::guest())
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else

                        <li class="nav-item dropdown"> 
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    <img src="{{ Auth::user()->avatar }}" height="40px" width="40px" >
                                    
                                    {{ Auth::user()->firstName . " " .Auth::user()->lastName }} <span class="caret"></span>

                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/home/edit" >Edit</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>   

    @yield('content')
        <footer>
     <div class="container">
       <div class="row">
       
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <span class="logo">LOGO</span>
                  <br><br>
                  <p style="color: white;"><i>the description of our website ,<br>
                    some words</i></p>                      
                </div>
                
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="menu">
                         <span>usefull links</span>    
                         <li>
                            <a href="#">Home</a>
                          </li>
                               
                          <li>
                             <a href="#">About</a>
                          </li>
                               
                          <li>
                            <a href="#">Contact us</a>
                          </li>
                               
                          <li>
                             <a href="#">Terms and condiitons</a>
                          </li>
                     </ul>
                </div>
           
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <ul class="address">
                        <span>Contact</span>       
                        <li>
                           <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">Phone</a>
                        </li>
                        <li>
                           <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">Adress</a>
                        </li> 
                        <li>
                           <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">Email</a>
                        </li> 
                   </ul>
               </div>
           
           
           </div> 
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/th3hpbt.js')}}"></script>
</body>
</html>
