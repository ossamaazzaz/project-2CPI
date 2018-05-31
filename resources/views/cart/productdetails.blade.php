@extends('layouts.appv2')

@section('content')
<!---Product Details-->
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

        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase">
                  <i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">{{$productDetails->description}}</p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-12" id="reviews">
          <div class="card border-light mb-3">
            <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Commentaires</div>
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
                      <button type="submit"n onclick="cmtToForm(this)" class="btn btn-success">
                            <i class="fa fa-edit"></i>
                      </button>
                      <a onclick="this.parentElement.parentElement.parentElement.remove()" href="/home/{{$comment->id}}/delete" >
                         <button type="submit" class="btn btn-danger">
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                         </button>
                      </a>
                     </div>
                    @endif

                  </div>
                </div>
              </hr>
              @endforeach
              <!--did we forgot raiting system -->
              <!--Add a comment -->

              <div class="row" id="comment-box-container" >
                <div class="col-md-2" style='margin-bottom: 20px;font-family: "Raleway", sans-serif'>
                  <img class="comment-img" src="{{ Auth::user()->avatar }}">
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
                <img class="img-fluid" src="{{ $product->image }}" style="display:block;margin-left: auto;margin-right: auto;height=1200px; width:1200px;"/>
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
        $("#comment-box-container").css("display","none");
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
        $("#comment-box-container").css("display","flex");
      }
</script>
@endsection
