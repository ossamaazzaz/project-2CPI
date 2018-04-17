@extends('layouts.app')

@section('content')
<!---Product Details------>
</br>
<div class="container">
    <div class="row">
        <!-- Image -->
          <div class="col-4 col-lg-7">
              <div class="card bg-light mb-3">
                  <div class="card-body">
                      <a href="" data-toggle="modal" data-target="#productModal">
                          <img src="{{$product->image}}" alt="Product Picture" class="img-fluid" style="display: block;margin-left: auto;margin-right: auto; height=500px; width:500px;"/>
                          <!--ps: must to add a slide show-->
                      </a>
                  </div>
              </div>
          </div>
      <!-- Add to cart -->

        <div class="col-12 col-lg-5 add_to_cart_block">
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
                    </div> <!--add function for that to say if the product still available-->
                        <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                        </button>
                    </form>
                    <div>


                        3 reviews <!-- it will be dynamic soon -->
                        @for($i = 0; $i <$productDetails[0]->rating; $i++)
                          <i class="fa fa-star" style="color: gold"></i>
                        @endfor
                        @for($i = $productDetails[0]->rating; $i < 5; $i++)
                        <i class="fa fa-star" style="color: black"></i>
                        @endfor
                        <!-- La moyenne des stars from reviews------>

                        ({{$productDetails[0]->rating}}/5)
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
                    <p class="card-text">{{$productDetails[0]->desc}}</p>
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

                         __by Iferroudjene Mouloud
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
                <img class="img-fluid" src="{{$product->image}}" style="display:block;margin-left: auto;margin-right: auto;height=1200px; width:1200px;"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
