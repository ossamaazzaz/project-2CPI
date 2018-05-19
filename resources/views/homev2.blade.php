@extends('layouts.appv2')

@section('content')
<section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOP</h1>
                  <h2>Remplir votre panier à la maison </h2>
                  <p>plateforme de vente à distance partielle adaptée aux contraintes du marché Algérien</p>
                  <button type="button" class="btn btn-default get">Remplir</button>
                </div>
                <div class="col-sm-6">
                  <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
              
                </div>
              </div>
              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOP</h1>
                  <h2>Remplir votre panier à la maison </h2>
                  <p>plateforme de vente à distance partielle adaptée aux contraintes du marché Algérien</p>
                  <button type="button" class="btn btn-default get">Remplir</button>
                </div>
                <div class="col-sm-6">
                  <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
            
                </div>
              </div>
              
              <div class="item">
                <div class="col-sm-6">
                  <h1><span>E</span>-SHOP</h1>
                  <h2>Remplir votre panier à la maison </h2>
                  <p>plateforme de vente à distance partielle adaptée aux contraintes du marché Algérien</p>
                  <button type="button" class="btn btn-default get">Remplir</button>
                </div>
                <div class="col-sm-6">
                  <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                  
                </div>
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
          
            <div class="brands_products"><!--brands_products-->
              <h2>Brands</h2>
              <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                  <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                  <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                  <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                  <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                  <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                  <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                </ul>
              </div>
            </div><!--/brands_products-->
            
            <div class="price-range"><!--price-range-->
              <h2>Price Range</h2>
              <div class="well text-center">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
              </div>
            </div><!--/price-range-->
            
            <div class="shipping text-center"><!--shipping-->
              <img src="images/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
          
          </div>
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Produits</h2>
            @for($i;$i<15;$i++)
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{ $result[$i]->image }}" alt="" />
                      <h2>{{ $result[$i]->price }} DA</h2>
                      <p> {{ $result[$i]->desc }}  </p>
                      
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>{{ $result[$i]->price }} DA</h2>
                        <p>{{ $result[$i]->desc }}</p>
                        <a type="button" onclick="addToCart({{ $result[$i]->id }})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li><a href="/home/{{$result[$i]->id}}"><i class="fa fa-plus-square"></i>Detailles</a></li>
                    <!-- here we put a form for quic view-->

                    <li><a href="/home/{{$result[$i]->id}}"><i class="fa fa-plus-square"></i>Voir le produit</a></li>
                  </ul>
                </div>
              </div>
            </div>
            @endfor
          </div><!--features_items-->
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Produits Recommandés</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">

                <div class="item active"> 
                  @for($i=0;$i<3;$i++)
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="{{ $result[$i]->image }}" alt="" />
                          <h2>{{ $result[$i]->price }} DZD</h2>
                          <p>{{ $result[$i]->name }}</p>
                          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                      </div>
                    </div>
                    </div>
                    @endfor 

                 
                </div>
                
                <div class="item">  
                @for($i=3;$i<6;$i++)    
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="{{ $result[$i]->image }}" alt="" />
                          <h2>{{ $result[$i]->price }} DZD</h2>
                          <p>{{ $result[$i]->name }}</p>
                          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>               
                      </div>
                    </div>
                  </div>    
                @endfor
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
