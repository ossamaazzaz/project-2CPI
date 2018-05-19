@extends('layouts.appv2')

@section('content')
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
					            	<h2>Ads</h2>
					              <img src="" alt="" />
					            </div><!--/shipping-->
					          
					          </div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center">Search Result</h2>
 						
 						<div class="col-sm-12" style="margin-bottom: 100px;">
									<div class="productinfo text-left">						
										<div class="col-md-4">
						                    <label>Brand : </label>
						                    <select id="brand" style="display: inline;">
						                      <option>All</option>
						                      @foreach ($brands as $brand)
						                        <option>{{ $brand }}</option>
						                      @endforeach
						                    </select>                
						                </div>
						                <div class="col-md-3">
							                <label>Rating : </label>
							                <div class="srating" style="display: inline;">
							                  <span id="star5" onclick="rating(5)">☆</span><span id="star4" onclick="rating(4)">☆</span><span id="star3" onclick="rating(3)">☆</span><span id="star2" onclick="rating(2)">☆</span><span id="star1" onclick="rating(1)">☆</span>
							                </div>
							            </div>
							            <div class="col-md-5"> 
						                  <label>Prix : </label>
						                  <input type="text" name="min" placeholder="min" id="minprice" style="width: 60px;">
						                  -
						                  <input type="text" name="max" placeholder="max" id="maxprice" style="width: 60px;">
						                </div>
						                <div class="col-md-3">
											<button id="filter" class="btn btn-default add-to-cart" style="background-color: #0fb9b1;color: white;"> recherche </button>
						                </div>
									</div>
						</div>
						@foreach($result as $product)
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
				</div>
			</div>
		</div>
	</section>
@endsection
