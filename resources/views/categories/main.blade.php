@extends('layouts.dashboard')
@section('page_heading','Categories')
@section('section')
<style type="text/css">
  .categorie-card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 300px;
  margin-bottom: 25px;
  text-align: center;
  font-family: arial;
  height: 400px;
  position: relative;
}
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background-color: #2f3542;
  overflow-y: scroll;
  width: 100%;
  height:0;
  transition: .5s ease;
}

.categorie-card:hover .overlay {
  top: 0;
  height: 230px;
}

.categorie-des{
  color: white;
  font-size: 16px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
</style>

 <a href="/admin/categories/add"><button type="button" class="btn btn-primary btn-block">ADD Categories</button></a>

<br />
<!-- show categories -->

<div class="card" style="margin: 10px;">
                <div class="container">
                    <div class="row">
                        @foreach ($categories as $cat)
                        <div class="col-md-4">
                            <div class="categorie-card">
                              <img src="{{$cat->picture}}" height="230px" width="300px">
                              <div class="overlay">
                                <div class="categorie-des">
                                  {{  $cat->description }}
                                </div>
                              </div>
                              <h1>{{ $cat->name }}</h1>
                              <div>
                                      <a href="/admin/categories/edit/{{$cat->id}}" role="button"><i class="btn btn-success" role="button"></i>&nbsp;edit</a>
                                
                                      <a href="/admin/categories/delete/{{$cat->id}}" role="button" class="btn btn-danger">
                                      <i class="fa fa-times"></i>&nbsp;remove</a>
                              </div> 
                              <button class="btn btn-primary">show more</button>
                              <br>
                              
                            </div>
                        </div>
                          @endforeach
                    </div>
                </div>
            </div>

@stop
