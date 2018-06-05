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
					            
					        
					            
					            <div class="shipping text-center"><!--shipping-->
					            	<h2>Ads</h2>
					              <img src="" alt="" />
					            </div><!--/shipping-->
					          
					          </div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center">Filtres de recherche</h2>
 						
 						<div class="col-sm-12 container" style="margin-bottom: 100px;">
 							<center>
									<div class="productinfo text-left row">
										<div class="col-md-4">
						                    <center><label>La marque : </label></center>
						                    <select id="brand" style="display: inline;">
						                      <option>All</option>
						                      @foreach ($brands as $brand)
						                        <option>{{ $brand }}</option>
						                      @endforeach
						                    </select>                
						                </div>
						                <div class="col-md-4">
						                    <center><label>Catégorie : </label></center>
						                    <select id="category">
						                      <option>All</option>
						                      @foreach ($categories as $c)
						                        <option id="{{ $cat->id }}" >{{ $c->name }}</option>
						                      @endforeach
						                    </select>                
						                </div>
						                  <div class="price-range col-md-4" style="margin-top: 2px">
						                  	<center><label>Prix :</label></center>
								              <div class="text-center" style="border: 0">
								              	
								                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" >
								            
								              </div>
								            </div>
						                
									</div>
									<br><br>
									<div class="row">
										<div class="col-md-6">
							            	 <input type="text" id="text-filter" name="search" placeholder="rechercher.."> 
							            </div>
										<div class="col-md-3" style="margin-top: 18px">
							                <label>Evaluation : </label>
								            <div class="srating" style="display: inline;">
								                  <span id="star5" onclick="rating(5)">☆</span><span id="star4" onclick="rating(4)">☆</span><span id="star3" onclick="rating(3)">☆</span><span id="star2" onclick="rating(2)">☆</span><span id="star1" onclick="rating(1)">☆</span>
											</div>
											<input type="hidden" id="ratingStore">
							            </div>
								         <div class="col-md-3" style="margin: -15px 0 0 -30px">
								         	<button id="filter" class="btn btn-default add-to-cart bg-primary" style="color: white;margin-top: 30px;"> <i class="fa fa-search"></i>Chercher </button>
								         </div>   
									</div>
									

										<center>
											
										</center>
							           <!--  <div class="col-md-3"> 
						                  <label>Prix : </label>
						                  <input type="text" name="min" placeholder="min" id="minprice" style="width: 60px;">
						                  -
						                  <input type="text" name="max" placeholder="max" id="maxprice" style="width: 60px;">
						                </div> -->
										<br>
									      <div class="sort-element" style="border:none;margin-right: 6px;">
									              Trié par 
									      </div>
									            <div class="sort-element" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px">
									                <div style="float: left;margin-right: 6px;" class="sort-text">Nom </div>
									              <div style="float: left;display: block;">
									                <div class="triangle triangle-up" id="nametoggleup" onclick="toggleTriangle(this,1)" ></div>
									                <div class="triangle triangle-down" id="nametoggledown" onclick="toggleTriangle(this,0)" ></div>
									              </div>
									            </div>
									             <div class="sort-element">
									                <div style="float: left;margin-right: 6px;" class="sort-text">Prix </div>
									              <div style="float: left;display: block;">
									                <div class="triangle triangle-up" id="pricetoggleup" onclick="toggleTriangle(this,1)" ></div>
									                <div class="triangle triangle-down" id="pricetoggledown" onclick="toggleTriangle(this,0)" ></div>
									              </div>
									            </div>
									             <div class="sort-element" style="border-top-right-radius: 10px;border-bottom-right-radius: 10px">
									                <div style="float: left;margin-right: 6px;" class="sort-text">Evaluation </div>
									              <div style="float: left;display: block;">
									                <div class="triangle triangle-up" id="ratetoggleup" onclick="toggleTriangle(this,1)" ></div>
									                <div class="triangle triangle-down" id="ratetoggledown" onclick="toggleTriangle(this,0)" ></div>
									              </div>
									            </div>
						</center>			            
						</div>

						<div class="col-sm-12" style="text-align: center;">
							<h2 class="title text-center">Résultat</h2>
						@if(count($result)==0)
							<h2>no result found</h2>
						@else

						
						@foreach($result as $product)
				            <div class="col-sm-4">
				              <div class="product-image-wrapper">
				                <div class="single-products">
				                    <div class="productinfo text-center">
				                      <img src="{{ $product->image }}" alt="" />
				                      <h2>{{ $product->price }} DA</h2>
				                      <p> {{ $product->name }}  </p>
				                      
				                    </div>
				                    <div class="product-overlay" style="background-image: url('{{$product->category->picture}}')">
				                      <div class="overlay-content">
				                        <p>{{ $product->desc }}</p>
				                        <a type="button" onclick="addToCart({{ $product->id }})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier</a>
				                      </div>
				                    </div>
				                </div>
				                <div class="choose">
				                  <ul class="nav nav-pills nav-justified">
				                  	<center><li><a href="/home/{{$product->id}}"><i class="fa fa-plus-square"></i>Detailles</a></li></center>
				                    
				                    <!-- here we put a form for quic view-->
				                  </ul>
				                </div>
				              </div>
				            </div>
				            @endforeach
				        </div>    
				            
					</div><!--features_items-->
					<input type="hidden" id="currentPage" value="{{ $currentPage }}">
		            <input type="hidden" id="lastPage" value="{{ $lastPage }}">
		            <center>
		             <ul class="pagination">
		              <li><a onclick="prePage({{ $currentPage }})">&laquo;</a></li>
		              @for ($i = 1;$i<=$lastPage;$i++)
		              <li><a id="{{ 'page' . $i}}" onclick="page({{$i}})">{{$i}}</a></li>
		              @endfor
		              <li><a onclick="nexPage({{ $currentPage }})">&raquo;</a></li>
		            </ul> 
		            </center>
		            @endif
				</div>
			</div>
		</div>
	</section>
<input type="hidden" id="productId">

@endsection
