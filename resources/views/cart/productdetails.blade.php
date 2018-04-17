@extends('layouts.app')

@section('content')
<!---Product Details------>
</br>
<div class="container">
    <div class="row">

        <!-- Image -->


        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img src="{{$product->image}}" alt="Product Picture" class="img-fluid" />
                        <!--remmembre to add a slide show-->
                    </a>
                </div>
            </div>
        </div>



        <!-- Add to cart -->

        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <div><p style="text-align: center;"><strong> {{$product->name}} </strong></p></div>
                    <div><p ><strong>Price  : {{$product->price}} DZD</strong> </p></div>

                    <form method="POST"  action="{{ action('ProductDetailsController@addItemToCart') }}" enctype="multipart/form-data">
                      <div>
                        <strong>Quantity : <input id="Quantity" type="text" name="Quantity" value="1" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"  style="width: 50px" /> </strong>
                      </div>

                    <div>
                      <input name="id" id="productId" value="{{$product->id}}" type="hidden"/>
                      <strong> Availability: In Stock/In Market </strong>
                    </div> <!--add function for that-->
                        <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                        </button>
                    </form>
                    <div>


                        3 reviews
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: gold"></i>
                        <i class="fa fa-star" style="color: black"></i>
                        <!-- La moyenne des stars from reviews------>

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
                    <p class="card-text">ibckcnkjf</p> <!--productDetails->rating -->
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
                         <!-- stars---->
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

                        <!-- stars---->
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
@stop
