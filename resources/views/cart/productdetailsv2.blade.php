@extends('layouts.appv2')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
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
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<h2>Ads</h2>
							<img src="" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<a href="" data-toggle="modal" data-target="#productModal">
									<img src="{{$product->image}}" alt="" />
								</a>
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active" >
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<center><div class="sharethis-inline-share-buttons " style="float: center;"></div></center>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$product->name}}</h2>
								
								<span>
								<form method="POST"  action="{{ action('ProductDetailsController@addItemToCart') }}" enctype="multipart/form-data">
									<span>{{$product->price }} DZD</span>
									<label>Quantity:</label>
									<input id="Quantity" type="text" name="Quantity" value="1" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"  style="width: 50px" />
									<input name="id" id="productId" value="{{$product->id}}" type="hidden"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Ajouter 
									</button>
								</form>
								</span>
								<p><b>Disponibilité :</b> @if($product->quantitySale>0) <p>In Stock</p>
														  @else <p>Not In Stock </p>
														  @endif</p>
								<p><b>Marque:</b> {{ $product->brand }}</p>
								<div>
						<!-- it will be dynamic soon (kacem)-->
                        @for($i = 0; $i <$productDetails->rating; $i++)
                          <i class="fa fa-star" style="color: gold"></i>
                        @endfor
                        @for($i = $productDetails->rating; $i < 5; $i++)
                        <i class="fa fa-star" style="color: black"></i>
                        @endfor
                        <!-- La moyenne des stars from reviews-->

                        ({{$productDetails->rating}}/5)
                        <a class="pull-right" href="#reviews" style="color: black"> View all reviews </a>
                    </div>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Description</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Commentaires(5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
							<p >{{$productDetails->description}}</p>	
							</div>
						</div>
							
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-6">
									<div class="container ">
						              @foreach ($productDetails->comments as $comment)
						                <div class="row">
						                  <div class="col-md-2" style="margin-bottom: 20px;">
						                    <img class="comment-img" src="{{ $comment->user->avatar }}">
						                  </div>
						                  <div class="col-md-10 container" style='margin-bottom: 10px;font-family: "Raleway", sans-serif'>
						                    <h4>  {{$comment->user->username }} </h4>
						                    <div><p>{{$comment->body}}</p></div>
						                    <span class="comment-date">{{$comment->created_at->diffForHumans() }}</span>
						                    @if (Auth::id() == $comment->user->id )
						                    <div class="tools-btns">
						                      <button type="submit" id="{{ $comment->user->id }}" onclick="cmtToForm(this)" class="btn btn-success">
						                            <i class="fa fa-edit"></i>
						                      </button>
						                      <a type="submit" class="btn btn-danger" onclick="this.parentElement.parentElement.parentElement.remove()" href="/home/{{$comment->id}}/delete" >
						                            <i class="fa fa-times" aria-hidden="true"></i>
						                      </a>
						                     </div>
						                    @endif

						                  </div>
						                </div>
						               @endforeach

						              <!--did we forgot raiting system -->
						              <!--Add a comment -->

						              <div class="row" id="comment-box-container" >
						                <div class="col-md-2" style='margin-bottom: 20px;font-family: "Raleway", sans-serif'>
						                  <img class="comment-img" width="20px" src="{{ Auth::user()->avatar }}">
						                </div>
						                <div class="col-md-10 container" style="margin-bottom: 20px;">
						                  <form method="POST" action="/home/{{$productDetails->product_id}}/comments">
						                    {{ csrf_field() }}
						                    <textarea name="body" class="comment-input" rows='1' onkeydown="autosize(this)" placeholder='Votre commentaire . . .' required></textarea>
						                    <i class="glyphicon glyphicon-remove"></i>
						                    <button type="submit" class="btn btn-success">Envoyer<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
						                  </form>
						                </div>
						              </div>
						              
						            </div>

									
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
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
                <img src="{{ $product->image }}" style="display:block;margin-left: auto;margin-right: auto;"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Scripts-->
<script type="text/javascript">
      var commentCont,comment,lngth,btns,cmtValue,btns1,el;
      //----------------------------------------------------------------------//
      function autosize(){
        el = this;
        setTimeout(function(){
          el.style.cssText = 'height:auto; padding:0';
          el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
      }
      //----------------------------------------------------------------------//
      var comment,lngth,btns,cmtValue,btns1;
      function cmtToForm(object){
        comment = object.parentNode.parentNode.childNodes[3];
        console.log(comment.innerHTML);
        lngth = comment.parentNode.parentNode.parentNode.childNodes.length;
        btns = document.getElementsByClassName("tools-btns");
        jQuery("#comment-box-container").css("display","none");
        cmtValue = (comment.innerHTML).substring(3,comment.innerHTML.length-4);
        commentCont = comment.childNodes[1];
        // get id (fixing a bug)
        id = object.id;
        comment.innerHTML ='<form method="POST" action="/home/'+id+'/update"><textarea name="body" class="comment-input" rows="1"  onkeydown="autosize(this)" placeholder="Votre commentaire . . ." required>'+cmtValue+'</textarea><button type="submit" class="btn btn-success"> Envoyer <i class="fa fa-paper-plane" aria-hidden="true"></i></button> </form><button class="btn btn-danger" onclick="cancelComment(this,cmtValue)">cancel</button>';
        for (var i = 0; i < btns.length; i++) {
          btns[i].style.display = 'none';
        }
      }
      //----------------------------------------------------------------------//
       function cancelComment(object,value){
        object.parentNode.innerHTML = '<p>'+value+'</p>';
        btns1 = document.getElementsByClassName("tools-btns");
        for (var i = 0; i < btns.length; i++) {
          btns1[i].style.display = 'block';
        }
        jQuery("#comment-box-container").css("display","flex");
      }
</script>
@endsection
