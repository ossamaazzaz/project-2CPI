@extends('layouts.appv2')

@section('content')
<section id="slider"><!--slider-->
          <div id="slider-carousel" class="carousel slide" data-ride="carousel" style="width: 100%">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" style="width: 100%">

              <div class="item active parallax" style="width: 100%;    background-image: url('{{asset('1.jpg')}}');">
                  <div class="caption animated rollIn">
                    <h1 style="color: white">Welcome to superrete</h1>
                    <h3>mouloud khra</h3>
                  </div>
              </div>

              <div class="item parallax" style="width: 100%;background-image: url('{{asset('2.jpg')}}');">
                  <div class="caption ">
                    <h1 style="color: white" class="animated rollIn">Mouloud is khra aussi</h1>
                    <h2 style="color: black">yes he is</h2>
                  </div>
              </div>     
              <div class="item parallax" style="width: 100%;background-image: url('{{asset('3.jpg')}}');">
                  <div class="caption animated rollIn">
                    <h1 style="color: white">get the fuck out of here</h1>
                    <h3>wow cool hehe</h3>
                  </div>
              </div>

             <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
        </div>
      </div>
  </section><!--/slider-->

    <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Categories</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              @foreach ($categories as $cat)
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a onclick="leftcategorylist(this)" id="{{ $cat->id }}">{{ $cat->name }}</a></h4>
                </div>
              </div>
              @endforeach

            </div><!--/category-products-->
            <div class="price-range"><!--price-range-->
              <h2>Price Range</h2>
              <div class="well text-center">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
              </div>
            </div><!--/price-range-->

            <div class="shipping text-center"><!--shipping-->
              <h2>Ads</h2>
              <img src="" alt="" />
            </div><!--/shipping-->

          </div>
        </div>

        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Produits</h2>
            @foreach($products as $product)
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{ $product->image }}" alt="" />
                      <h2>{{ $product->price }} DA</h2>
                      <p> {{ $product->name }}  </p>
                      
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>{{ $product->price }} DA</h2>
                        <p>{{ $product->desc }}</p>
                        <a type="button" onclick="addToCart({{ $product->id }})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li><a href="/home/{{$product->id}}"><i class="fa fa-plus-square"></i>Detailles</a></li>
                    <!-- here we put a form for quic view-->

                    <li><a href="/home/{{$product->id}}"><i class="fa fa-plus-square"></i>Voir le produit</a></li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
          </div><!--features_items-->
          <input type="hidden" id="currentPage" value="{{ $currentPage }}">
          <input type="hidden" id="lastPage" value="{{ $lastPage }}">
           <ul class="pagination">
            <li><a onclick="prePage({{ $currentPage }})">&laquo;</a></li>
            @for ($i = 1;$i<=$lastPage;$i++)
            <li><a id="{{ 'page' . $i}}" onclick="page({{$i}})">{{$i}}</a></li>
            @endfor
            <li><a onclick="nexPage({{ $currentPage }})">&raquo;</a></li>
          </ul> 
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Produits Recommandés</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">

                <div class="item active"> 
                  @foreach($productsfeactured as $product)
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="{{ $product->image }}" alt="" />
                          <h2>{{ $product->price }} DZD</h2>
                          <p>{{ $product->name }}</p>
                          <a class="btn btn-default add-to-cart" onclick="addToCart({{ $product->id }})"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                      </div>
                    </div>
                    </div>
                    @endforeach

                 
                </div>
                
                <div class="item">  
                @foreach($productsfeactured as $product)   
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="{{ $product->image }}" alt="" />
                          <h2>{{ $product->price }} DZD</h2>
                          <p>{{ $product->name }}</p>
                          <a class="btn btn-default add-to-cart" onclick="addToCart({{ $product->id }})"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>               
                      </div>
                    </div>
                  </div>    
                @endforeach
              </div>
                 
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
          </div><!--/recommended_items-->

        </div>
      </div>
    </div>
  </section>
@endsection
