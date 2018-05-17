@extends('layouts.dashboard')
@section('page_heading','Categories')
@section('section')

 <a href="/admin/categories/add"><button type="button" class="btn btn-primary btn-block" style="background-color: #1976d2">ADD Categories</button></a>

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

                                      <a href="/admin/categories/edit/{{$cat->id}}" role="button">
                                        <button class="btn btn-success" style="background-color: #78e08f"><i class=""></i>&nbsp;edit</button>
                                      </a>
                                
                                      <a href="/admin/categories/delete/{{$cat->id}}" role="button" class="btn btn-danger" style="background-color: #ff7675">
                                      <i class="fa fa-times"></i>&nbsp;remove</a>
                              </div> 
                              <br>
                              
                            </div>
                        </div>
                          @endforeach
                    </div>
                </div>
            </div>

@stop
