@extends('layouts.dashboard')
@section('page_heading','Add Categories')
@section('section')

      <div class="card-body">
          <form method="POST" action="{{ action('CategoriesController@Add') }}" enctype="multipart/form-data">
              @csrf
              <!-- Make sure to make this more dynamic, refactor it later -->

              <!--------------------- Name-------------------->
              <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-right">Name :</label>

                  <div class="col-md-3">
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  required autofocus>

                      @if ($errors->has('name'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <!------------------ID-------------------------->

               <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-right">ID :</label>

                  <div class="col-md-2">
                    <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id"  required autofocus>  
                  </div>
              </div>
          
              <!--------------- Parent category---------------->
              <div class="form-group">
                <div class="form-group row">
                    <label for= "" class="col-md-2 col-form-label text-md-right">Parent Category:</label>
                    <div class="col-md-2">
                      <div class="form-group">
                          <select class="form-control" id="sel1">
                            @foreach ($Pcategory as $cat)
                                  <option id="{{$cat->id}}">
                                      {{$cat->name}}
                                  </option>
                            @endforeach
                          </select>
                    </div>
                </div>
              </div>

              <!----------------- Description------------------>

              <div class="form-group row">
                  <label for="description" class="col-md-2 col-form-label text-md-right">Description :</label>
                  <div class="col-md-4">
                       <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  required autofocus  rows="3"></textarea>
                      @if ($errors->has('description'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              
             <!------------------ Picture-------------------->
              <div class="form-group ">
                <div class="form-group row">
                  <label for="picture" class="col-md-2 col-form-label text-md-right">Picture :</label>

                  <div class="col-md-3">
                      <input id="picture" type="file" class="{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" required autofocus>

                      @if ($errors->has('picture'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('picture') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
              </div>

            <!----------------- ADD Button------------------------>
              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-success">
                        <i class="fa fa-check-square-o" style="font-size:18px"></i>
                          {{ __('ADD') }}
                      </button>
                  </div>
              </div>

          </form>
      </div>
@stop
