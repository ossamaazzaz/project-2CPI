<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatabes.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}"> 

   <title> Product Details </title>
</head>

<body>
<!---------Product Details------------>  
  <h2 style="text-align: center;"> Product Details  </h2>

  <div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <!-- Image -->


        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img src="http://fakeimg.pl/800x800/" class="img-fluid" />
                        <p style="text-align: center;">Product Picture </p>
                        <p style="text-align: right;">Zoom</p>
                    </a>
                </div>
            </div>
        </div> 
  
        

        <!-- Add to cart -->

        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <div><p style="text-align: center;"><strong> Product Name </strong></p></div>
                    <div><p ><strong>Price  : $70.00 </strong> </p></div>
                    <div><p ><strong>Quantity : <input type="text" value="1" style="width: 50px" /> </strong> 
                         </p>
                    </div>
                    <div><strong> Availability: In Stock/In Market </strong></div>
                    <div><strong> Detail 4 ....</strong></div>
                    <div><strong> Detail 5 ....</strong></div>
                       
  
                        <a href="#" class="btn btn-success btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                        </a>
                   
                    <div >

                        3 reviews
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: black"></i>
                        <!----- La moyenne des stars from reviews------>

                        (4/5)
                        <a class="pull-right" href="#reviews">View all reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

     
     <div class="row">

        <!-- Description -->

        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase">
                  <i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">
                        DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription
                    </p>
                    <p class="card-text">
                          DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription  DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription
                    </p>
                </div>
            </div>
        </div>

        <!-- Reviews -->

        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Reviews</div>
                <div class="card-body">
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018
                         <!---- stars---->
                        <span class="fa fa-star" style="color: gold"></span>
                        <span class="fa fa-star" style="color: gold"></span>
                        <span class="fa fa-star" style="color: gold"></span>
                        <span class="fa fa-star" style="color: black"></span>
                        <span class="fa fa-star" style="color: black"></span>
               
                        __by Seyf Goumeida
                        <p class="blockquote">
                            <p class="mb-0">Review  Review Review  Review Review </p>
                        </p>
                        <hr>
                    </div>
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018
                       
                        <!---- stars---->
                        <span class="fa fa-star" style="color: gold"></span>
                        <span class="fa fa-star" style="color: gold"></span>
                        <span class="fa fa-star" style="color: gold"></span>
                        <span class="fa fa-star" style="color: gold"></span>
                        <span class="fa fa-star" style="color: black"></span>

                         __by Seyf Goumeida
                        <p class="blockquote">
                            <p class="mb-0">Review  Review Review Review Review </p>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal image -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="https://dummyimage.com/1200x1200/55595c/fff" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
