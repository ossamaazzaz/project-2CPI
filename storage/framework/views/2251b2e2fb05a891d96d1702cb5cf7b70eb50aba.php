<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>E-COM</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>">
    <!--comments css -->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo e(asset('css/comments.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/introjs.css')); ?> " rel="stylesheet">
    <!--end commennts css -->
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5af0df9065adf70011389756&product=sticky-share-buttons' async='async'></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'E-com')); ?>

                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <form class="navbar-nav mr-auto" method="GET" action="/search">
                      <ul class="navbar-nav">
                       <li><input id="term" name="term" type="text" value="" placeholder="Enter here" aria-describedby="ddlsearch" style="width: 300px;height: 40px; margin: 3px;"></li>
                        <li><div id="dropdownMenu" class="dropdown">
                            <dev class="btn" data-toggle="dropdown" style="height: 40px;">
                            <i  class="fa fa-bars" aria-hidden="true"></i>
                            <span class="caret"></span>
                            <label id="chosed"><input type="text" id="category" name="category" hidden="true" value=""></label>
                              </dev>
                            <div class="dropdown-menu" id="selectedCategory">
                              <?php if((!Request::is('home/edit','login','register','password/reset'))): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="dropdown-item" id="<?php echo e($cat->id); ?>" onclick="selectedCategory(this)"><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
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
                    <ul class="navbar-nav navbar-right ml-auto">
                    <li class="nav-item">
                       <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="fa fa-bell"></span></button>
                        <ul class="dropdown-menu">
                          <?php if((!Request::is('home/edit','login','register','password/reset'))): ?>
                          <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($notif != null): ?>
                            <li>
                              <dev class="notif">
                                <?php if($notif->type == 'missingproduct'): ?>
                                  <a onclick="getmissingproduct('<?php echo e($notif->data); ?>')">there is a missing products on your order : <?php echo e($notif->data); ?><br>click to confirm or delete ! </a>
                                <?php else: ?>
                                  <a href="<?php echo e('facture/' . $notif->data); ?>">Your code is : <?php echo e($notif->data); ?></a>
                                <?php endif; ?>
                              </dev>
                            </li>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </ul>
                      </div>
                    </li>
                    <?php if(Auth::guest()): ?>
                        <li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                            <li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                    <?php else: ?>
                        <li>
                          <div style="padding :16px 20px; ">
                              <a href="/cart"> <i class="fa fa-shopping-cart"></i> Shopping Cart
                                  <span class="badge">
                                    <!-- i will (mouloud) add here later the badge -->
                                  </span>
                              </a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    <img src="<?php echo e(Auth::user()->avatar); ?>" height="40px" width="40px">

                                    <?php echo e(Auth::user()->firstName . " " .Auth::user()->lastName); ?> <span class="caret"></span>

                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/home/edit" >Edit</a>
                                    <a href="/orders" class="dropdown-item">Orders</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                     </form>
                                </div>
                            </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
        <!--success message-->

    <?php if(session('success')): ?>
      <div class="container">
        <div class="alert alert-success">
          <?php echo e(session('success')); ?>

        </div>
      </div>
    <?php endif; ?>

    <!--error message-->

    <?php if(session('error')): ?>
      <div class="container">
        <div class="alert alert-danger">
          <?php echo e(session('error')); ?>

        </div>
      </div>
    <?php endif; ?>


    <?php echo $__env->yieldContent('content'); ?>
    <footer>
     <div class="container">
       <div class="row">
              <!-- model of confirmed by ossama azzaz-->
               <input type="hidden" id="code" name="">
               <div id="cmodale" class="cmodale canimated jackInTheBox">
                    <h1>Missing Products :</h1>
                    <h2 id="missingproducts"></h2>
                    <h1>Available Products :</h1>
                    <h2 id="availableproducts"></h2>
                    <dev>
                      <button class="btn btn-success" onclick="confirmissingproduct()">Confirm and delete Missing Products</button>
                      <button class="btn btn-primary" onclick="backToCart()">Add to Cart</button>
                      <button class="btn btn-warning" onclick="deleteorder()">Delete</button>
                    </dev>
                </div>
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

    <script src="<?php echo e(asset('js/intro.js')); ?>"></script>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables-init.js')); ?>"></script>
    <script src="<?php echo e(asset('js/th3hpbt.js')); ?>"></script>
    <script src="<?php echo e(asset('js/searchresult.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pagination.js')); ?>"></script>
    <script src="<?php echo e(asset('js/cart.js')); ?>"></script>
</body>
</html>
