@extends('layouts.app')

@section('content')
<input type="text" hidden="true" name="" >
<div class="container">
    <div class="row">
        <div class="col-lg-3">
          
          <h1 class="my-4">Categories</h1>
          <div class="list-group">
            @foreach ($categories as $cat)
            <a onclick="leftcategorylist(this)" id="{{ $cat->id }}" class="list-group-item">{{ $cat->name }}</a>
            @endforeach
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="form-control card"
            >
             <div class="container" style="padding: 14px;">
              <div class="row">
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
                  <label>Price : </label>
                  <input type="text" name="min" placeholder="min" id="minprice" style="width: 60px;">
                  -
                  <input type="text" name="max" placeholder="max" id="maxprice" style="width: 60px;">
                </div>
              </div>
            </div>
            <button id="filter" class="btn btn-outline-warning"> Apply </button>

    <div class="container">

      <div class="sort-element" style="border:none;margin-right: 6px;">
              Sorted by 
            </div>
            <div class="sort-element" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px">
                <div style="float: left;margin-right: 6px;" class="sort-text">Name </div>
              <div style="float: left;display: block;">
                <div class="triangle triangle-up" id="nametoggleup" onclick="toggleTriangle(this,1)" ></div>
                <div class="triangle triangle-down" id="nametoggledown" onclick="toggleTriangle(this,0)" ></div>
              </div>
            </div>
             <div class="sort-element">
                <div style="float: left;margin-right: 6px;" class="sort-text">Price </div>
              <div style="float: left;display: block;">
                <div class="triangle triangle-up" id="pricetoggleup" onclick="toggleTriangle(this,1)" ></div>
                <div class="triangle triangle-down" id="pricetoggledown" onclick="toggleTriangle(this,0)" ></div>
              </div>
            </div>
             <div class="sort-element" style="border-top-right-radius: 10px;border-bottom-right-radius: 10px">
                <div style="float: left;margin-right: 6px;" class="sort-text">Rate </div>
              <div style="float: left;display: block;">
                <div class="triangle triangle-up" id="ratetoggleup" onclick="toggleTriangle(this,1)" ></div>
                <div class="triangle triangle-down" id="ratetoggledown" onclick="toggleTriangle(this,0)" ></div>
              </div>
            </div>
            
    </div>
    
    </div>

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
            <input type="hidden" id="currentPage" value="{{ $currentPage }}">
            <input type="hidden" id="lastPage" value="{{ $lastPage }}">
             <div class="pagination">
              <a onclick="prePage({{ $currentPage }})">&laquo;</a>
              @for ($i = 1;$i<=$lastPage;$i++)
              <a id="{{ 'page' . $i}}" onclick="page({{$i}})">{{$i}}</a>
              @endfor
              <a onclick="nexPage({{ $currentPage }})">&raquo;</a>
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
