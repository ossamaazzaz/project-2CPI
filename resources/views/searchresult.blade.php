@extends('layouts.app')

@section('content')
<input type="text" hidden="true" name="" >
<div class="container">
    <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Categories</h1>
          <div class="list-group">
            @foreach ($categories as $cat)
            <a href="#" class="list-group-item">{{ $cat->name }}</a>
            @endforeach
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <form method="GET" action="/home/search">
            <div class="form-control card"
            >
             <div class="container" style="padding: 14px;">
              <div class="row">
                <div class="col-md-3">
                    <label>Brand : </label>
                    <select id="brand">
                      <option>All</option>
                      <option>brand 1</option>
                    </select>                
                </div>
                <div class="col-md-3">
                <label>Rating : </label>
                <div class="srating" style="display: inline;">
                  <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
   
              </div>
                <div class="col-md-5"> 
                  <label>Price : </label>
                  <input type="text" name="min" placeholder="min" style="width: 60px;">
                  -
                  <input type="text" name="max" placeholder="max" style="width: 60px;">
                </div>
              </div>
            </div>
            </div>
          </form>
         
          <div class="fadeInUp">


          <h1 class="categorie-title my-4"><a>Result</a></h3>
          <div class="categorie-title-divider"></div>
          
       <div id="container">

          <div class="list">
            @foreach ($result as $element)
              <li>
                <div class="container card">
                  <div class="row">
                    <div class="col-xs-4">
                      <img src="{{ $element->image }}" width="270" height="270" class="productImage">
                    </div>
                    <div class="col-xs-4"  style="width: 40%;">
                        <div class="row productName"><a><h4><b style="color: black;">{{ $element->name }}</h4></a></div>
                        <div class="row productBrand" style="color: #555;font-size: 30px">
                          <h6>&copy;{{ $element->brand }}</h6>
                        </div>
                        <div class="row productBrand"></div>
                        <div class="row rating">
                          @for ($i = 0; $i < $element->productDetails->rating; $i++)
                              <span class="rating goldy">★</span>
                          @endfor
                          @for ($i = 0; $i < 5 - $element->productDetails->rating; $i++)
                              <span class="rating empty">☆</span>
                          @endfor                  
                        </div>
                          <div class="row description">
                              <p>{{ $element->productDetails->description }}</p>
                          </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="row Productprice">
                        <h4><B> {{ $element->price }} DA</B></h4></div>                   
                      <br>
                      <div class="row btn btn-primary" style="background-color: #00b894">
                          <span class="glyphicon glyphicon-shopping-cart"></span> add to cart 
                      </div>
                      <br><br>
                      <div class="row btn btn-primary" style="background-color: #d63031">
                          <span class="glyphicon glyphicon-heart"></span> add to wishlist
                      </div>    
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          </div><br>
          <div class="container card">
             <div class="pagination">
              <a href="#">&laquo;</a>
              <a href="#">1</a>
              <a class="active" href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#">6</a>
              <a href="#">&raquo;</a>
            </div> 
          </div>
         
      </div>    


      </div>
  <!-- -->
        </div>
        
      </div>
      <!-- /.row -->
</div>
@endsection
