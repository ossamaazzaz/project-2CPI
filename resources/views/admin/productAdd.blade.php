@extends('layouts.dashboard')
@section('page_heading','Add Product')
@section('section')
<div class="card-body">
                    <form method="POST" action="{{ action('ProductController@add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">brand  Name</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ old('brand') }}" required autofocus>

                                @if ($errors->has('brand'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">quantity </label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}" required autofocus>

                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantitySale" class="col-md-4 col-form-label text-md-right">quantity Sale </label>

                            <div class="col-md-6">
                                <input id="quantitySale" type="text" class="form-control{{ $errors->has('quantitySale') ? ' is-invalid' : '' }}" name="quantitySale" value="{{ old('quantitySale') }}" required autofocus>

                                @if ($errors->has('quantitySale'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantitySale') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
		               <label for="desc" class="col-md-4 col-form-label text-md-right">Description :</label>
		                  <div class="col-md-6">
		                       <textarea id="desc" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc"  required autofocus  rows="3"></textarea>
		                      @if ($errors->has('desc'))
		                          <span class="invalid-feedback">
		                              <strong>{{ $errors->first('desc') }}</strong>
		                          </span>
		                      @endif
		                  </div>
              	</div>

              	<div class="form-group row">
                            <label for="categoryId" class="col-md-4 col-form-label text-md-right">Category </label>

                            <div class="col-md-6">
                            	<!-- to be changed by category dudes-->
                <select name="categoryId">
                    <option value="" selected="selected">Chose category </option>
                    @foreach ($categories as $cat)
					  <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                    @endforeach
				</select>

                                @if ($errors->has('categoryId'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('categoryId') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>


              	

                        <div class="form-group row">
                            <label for="images" class="col-md-4 col-form-label text-md-right"> Images </label>

                            <div class="col-md-6">
                                <input id="images" type="file" class="form-control{{ $errors->has('images') ? ' is-invalid' : '' }}" name="images[]" value="{{ old('images') }}" required multiple>

                                @if ($errors->has('images'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>
@stop