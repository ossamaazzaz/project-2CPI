@extends('layouts.dashboard')
@section('page_heading','Edit Categories')
@section('section')
<div class="card">
      <div class="card-body">
          <form method="POST" action="/admin/categories/edit/{{$id}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$cat->name}}"  required autofocus>

                      @if ($errors->has('name'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                  <div class="col-md-6">
                       <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus  rows="5">{{$cat->description}}</textarea>
                       
                      @if ($errors->has('description'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
            <!--
              <div class="form-group ">
                <div class="form-group row">
                  <label for="picture" class="col-md-4 col-form-label text-md-right">Picture :</label>
                  <div class="col-md-6">
                      <input id="picture" type="file" class="{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" required autofocus>
                      @if ($errors->has('picture'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('picture') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
              </div>
            !-->
            <div class="form-group ">
                <div class="form-group row">
                  <label for="picture" class="col-md-4 col-form-label text-md-right">Photo</label>

                  <div class="col-md-6">
                      <input id="picture" type="file" class="{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" accept="image/*">

                      @if ($errors->has('picture'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('picture') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary" style="background-color: #1976d2">
                        <i class="fa fa-check-square-o" style="font-size:18px"></i>
                          {{ __('Editer') }}
                      </button>
                  </div>
              </div>
          </form>
      </div>
      </div>
@stop