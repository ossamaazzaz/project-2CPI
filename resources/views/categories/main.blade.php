@extends('layouts.dashboard')
@section('page_heading','Categories')
@section('section')
<div class="input-group custom-search-form">
    <input type="text" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
<br>

 <a href="/categories/add"><button type="button" class="btn btn-primary btn-block">ADD Categories</button></a>


<br />
<!-- show categories -->
<div class="row">
  @foreach ($categories as $cat)
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <img src="{{$cat->picture}}" alt="categorie image" width="%50">
        <div class="caption">
          <h3>{{ $cat->name }}</h3>
          <p><!-- description -->
             {{  $cat->description }}
          </p>

          <p>
            <!-- button-->
              <a href="/categories/edit/{{$cat->id}}" class="btn btn-primary" role="button">Edit</a>
              <a href="/categories/delete/{{$cat->id}}" class="btn btn-default" role="button">Delete</a>
            <!-- feel free to add-->
          </p>
        </div>
      </div>
    </div>
  @endforeach
</div>

<!-- errors nd stuff
<div>
  <p>{{ "errors" }}</p>
</div>
-->





@stop
