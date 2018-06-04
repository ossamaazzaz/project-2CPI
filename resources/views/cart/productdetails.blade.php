@extends('layouts.appv2')

@section('content')

<!---Product Details-->
<style>
  body{
    overflow-x: hidden;
  }
  .product-img {
    cursor: pointer;
    transition: 0.3s;
}

.product-img:hover{
    opacity: 0.5;
}


.img-modal-bg{
    display: none; 
    position: fixed;
    z-index: 99999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9);
}

.img-modal-content {
    margin: auto;
    display: block;
    width: 60%;
    max-width: 700px;
    height: 80%;
}

.img-modal-content {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.img-modal-close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.img-modal-close:hover,
.img-modal-close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* responsive with small screen devices */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
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
      <h2 class="title text-center">Produits</h2>
      <div class="container">
          <div class="row">
              <!-- Image -->
                <div class="col-4 col-lg-5">
                    <div class="card mb-3">
                        <div class="card-body">
                            <a>
                                <img src="{{$product->image}}" alt="Product Picture" class="img-fluid product-img" onclick="showImgModal(this)" style="display: block;margin-left: auto;margin-right: auto; height=500px; width:500px;"/>
                                <!--ps: must to add a slide show-->
                            </a>
                        </div>
                    </div>
                </div>
            <!-- Add to cart -->

              <div class="col-12 col-lg-4 add_to_cart_block">
                  <div class="card mb-3">
                      <div class="card-body">
                          <div><p><h3 style="text-align: center;"> {{$product->name}} </h3></p>
                            <br></div>
                          <div><p ><strong>Price  : {{$product->price}} DZD</strong> </p></div>

                          <form method="POST"  action="{{ action('ProductDetailsController@addItemToCart') }}" enctype="multipart/form-data">
                            <div>
                              <strong>Quantity : <input id="Quantity" type="text" name="Quantity" value="1" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"  style="width: 50px" /> </strong>
                            </div>

                          <div>
                            <input name="id" id="productId" value="{{$product->id}}" type="hidden"/>
                            <strong> Availability: In Stock/In Market </strong>
                            <br><br>
                          </div> <!--add function for that to say if the product still available-->
                              <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase">
                                  <i class="fa fa-shopping-cart"></i> Add To Cart
                              </button>
                          </form>
                          <div>


                              3 reviews <!-- it will be dynamic soon (kacem)-->
                              @for($i = 0; $i <$productDetails->rating; $i++)
                                <i class="fa fa-star" style="color: gold"></i>
                              @endfor
                              @for($i = $productDetails->rating; $i < 5; $i++)
                              <i class="fa fa-star" style="color: black"></i>
                              @endfor
                              <!-- La moyenne des stars from reviews-->

                              ({{$productDetails->rating}}/5)
                              <a class="pull-right" href="#reviews">View all reviews</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
           <div class="row">
                  <!-- Description -->

              <div class="col-9">
                  <div class="card border-light mb-3">
                      <div class="card-header bg-primary text-white text-uppercase">
                        <i class="fa fa-align-justify"></i> Description</div>
                      <div class="card-body">
                          <p class="card-text" style="padding-left: 15px">
                            {{$productDetails->description}}
                          </p>
                      </div>
                  </div>
              </div>

              <!-- Reviews -->
              <div class="col-9" >
                <div class="card border-light mb-3">
                  <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Commentaires</div>
                  
                  <div class="container">
                     @foreach ($productDetails->comments as $comment)
                      <div class="row" style="margin-top: 20px;">
                        <div class="col-md-2" style="margin-bottom: 20px;">
                          <img class="comment-img" src="{{ $comment->user->avatar }}">
                        </div>
                        <div class="col-md-10 container" style='margin: 0 0 10px -50px;font-family: "Raleway", sans-serif'>
                          <h4>  {{$comment->user->username }} </h4>
                          <div><p>{{$comment->body}}</p></div>
                          <span class="comment-date">{{$comment->created_at->diffForHumans() }}</span>
                          @if (Auth::id() == $comment->user->id )
                          <div class="tools-btns">
                            <button type="submit" id="{{ $product->id }}" onclick="cmtToForm(this)" class="btn btn-success">
                                  <i class="fa fa-edit"></i>
                            </button>
                            <a onclick="this.parentElement.parentElement.parentElement.remove()" href="/home/{{$comment->id}}/delete" >
                               <button type="submit" class="btn btn-danger">
                                  <i class="fa fa-times" aria-hidden="true"></i>
                               </button>
                            </a>
                           </div>
                          @endif

                        </div>
                      </div>

                    @endforeach
                    <!--did we forgot raiting system -->
                    <!--Add a comment -->
                    @if (Auth::user())
                    <div class="row" id="comment-box-container" style="margin-top: 30px;" >
                      <div class="col-md-2" style='margin-bottom: 20px;font-family: "Raleway", sans-serif'>
                        <img class="comment-img" src="{{ Auth::user()->avatar }}">
                      </div>
                      <div class="col-md-10 container" style="margin: 0 0 20px -50px;">
                        <form method="POST" action="/home/{{$productDetails->product_id}}/comments">
                          {{ csrf_field() }}
                          <textarea name="body" class="comment-input" rows='2' onkeydown="autosize(this)" placeholder='Votre commentaire . . .' required></textarea>
                          <button type="submit" class="btn btn-success">Envoyer <i class="glyphicon glyphicon-send" aria-hidden="true"></i></button>
                        </form>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>

            </div>
          </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal image -->
<div id="img-modal" class="img-modal-bg">
  <span class="img-modal-close" onclick="imgModal.style.display = 'none'">&times;</span>
  <img class="img-modal-content">
</div>
<!--Scripts-->
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5af0df9065adf70011389756&product=sticky-share-buttons' async='async'></script>
<script type="text/javascript">
      var commentCont,comment,lngth,btns,cmtValue,btns1,el;
      //----------------------------------------------------------------------//
      function autosize(object){
        setTimeout(function(){
          object.style.cssText = 'height:auto; padding:0';
          object.style.cssText = 'height:' + object.scrollHeight + 'px';
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
        comment.innerHTML ='<form method="POST" action="/home/'+id+'/update"><textarea name="body" class="comment-input" rows="1"  onkeydown="autosize(this)" placeholder="Votre commentaire . . ." required>'+cmtValue+'</textarea><button type="submit" class="btn btn-success" style="display:inline;"> Envoyer <i class="fa fa-paper-plane" aria-hidden="true"></i></button> <button class="btn btn-danger" onclick="cancelComment(this,cmtValue)" style="display:inline;">cancel</button></form>';
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
      /*---------------------------------------------*/
      var imgModal = document.getElementById('img-modal');

        var modalImg = imgModal.childNodes[3];
        function showImgModal(object){
            imgModal.style.display = "block";
            modalImg.src = object.src;
        }

</script>



@endsection
