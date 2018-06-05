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
								<p><b>Disponibilité :</b> @if($product->quantitySale>0) <p style="color: green;">In Stock</p>
														  @else <p style="color: red;">Not In Stock </p>
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
                    <hr>
                    <div id="ratingTab">
                    <label class="pull-left" style="display: inline;">Rating : </label>
                   	<div class="srating pull-left" style="margin-right:  10px;">
			                <span id="star5" onclick="rating(5)" style="display: inline;"><i class="fa fa-star" style="color: black"></i></span>
			                <span id="star4" onclick="rating(4)" style="display: inline;"><i class="fa fa-star" style="color: black"></i></span>
			                <span id="star3" onclick="rating(3)" style="display: inline;"><i class="fa fa-star" style="color: black"></i></span>
			                <span id="star2" onclick="rating(2)" style="display: inline;"><i class="fa fa-star" style="color: black"></i></span>
			                <span id="star1" onclick="rating(1)" style="display: inline;"><i class="fa fa-star" style="color: black"></i></span>
						</div>
					<button class="btn btn-success" onclick="saveRate({{ $product->id }})">Rate !</button>
                    </div>
					<label id="afterRating" class="hidden" style="display: inline;">Thanks !</label>		
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-6">
							<ul class="nav nav-tabs">
								<li><a class="active" href="#details" data-toggle="tab">Description</a></li>
								<li><a href="#reviews" data-toggle="tab">Commentaires(5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
							<p >{{$productDetails->description}}</p>	
							</div>
														<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
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
						                      <button type="submit" id="{{ $comment->id }}" onclick="cmtToForm(this)" class="btn btn-success">
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
						                    <div class="col-md-6">
											<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i></button>
						                    <button type="submit" class="btn btn-success">Envoyer<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							            	</div>
						                    

						                  </form>
						                </div>
						              </div>
						              
						            </div>
								</div>
							</div>
						</div>
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>
<!-- Modal image -->
<input type="hidden" id="productId" value="{{$product->id}}">
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
        lngth = comment.parentNode.parentNode.parentNode.childNodes.length;
        btns = document.getElementsByClassName("tools-btns");
        jQuery("#comment-box-container").css("display","none");
        cmtValue = (comment.innerHTML).substring(3,comment.innerHTML.length-4);
        commentCont = comment.childNodes[1];
        // get id (fixing a bug)
        id = object.id;
        comment.innerHTML =`<form method="POST" action="/home/`+id+`/update">
						                    <textarea name="body" class="comment-input" rows='1' onkeydown="autosize(this)" placeholder='Votre commentaire . . .' required>`+cmtValue+`</textarea>
											<input type="hidden" id="ratingStore" name="rating">
											<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i></button>
						                    <button type="submit" class="btn btn-success">Envoyer<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							            	</div>
						                  </form>`;
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
