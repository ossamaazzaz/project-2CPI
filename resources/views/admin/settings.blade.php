@extends('layouts.dashboard')
@section('page_heading','Settings')
@section('section')
      <div class="card-body">
          <form method="POST" action="{{action('SettingsController@editText')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name :</label>
                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$shop->name}}"  required autofocus>

                      @if ($errors->has('name'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label text-md-right">Description :</label>
                  <div class="col-md-6">
                       <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus  rows="3">{{$shop->description}}</textarea>
                       
                      @if ($errors->has('description'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="link" class="col-md-4 col-form-label text-md-right">link :</label>
                  <div class="col-md-6">
                      <input id="link" type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{$shop->link}}"  required autofocus>

                      @if ($errors->has('link'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('link') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">email :</label>
                  <div class="col-md-6">
                      <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$shop->email}}"  required autofocus>

                      @if ($errors->has('email'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="addr" class="col-md-4 col-form-label text-md-right">addr :</label>
                  <div class="col-md-6">
                      <input id="addr" type="text" class="form-control{{ $errors->has('addr') ? ' is-invalid' : '' }}" name="addr" value="{{$shop->addr}}"  required autofocus>

                      @if ($errors->has('addr'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('addr') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="phone_num" class="col-md-4 col-form-label text-md-right">phone_num :</label>
                  <div class="col-md-6">
                      <input id="phone_num" type="text" class="form-control{{ $errors->has('phone_num') ? ' is-invalid' : '' }}" name="phone_num" value="{{$shop->phone_num}}"  required autofocus>

                      @if ($errors->has('phone_num'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('phone_num') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="fb_link" class="col-md-4 col-form-label text-md-right">fb_link :</label>
                  <div class="col-md-6">
                      <input id="fb_link" type="text" class="form-control{{ $errors->has('fb_link') ? ' is-invalid' : '' }}" name="fb_link" value="{{$shop->fb_link}}"  required autofocus>

                      @if ($errors->has('fb_link'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('fb_link') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="insta_link" class="col-md-4 col-form-label text-md-right">insta_link :</label>
                  <div class="col-md-6">
                      <input id="insta_link" type="text" class="form-control{{ $errors->has('insta_link') ? ' is-invalid' : '' }}" name="insta_link" value="{{$shop->insta_link}}"  required autofocus>

                      @if ($errors->has('insta_link'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('insta_link') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="twitter_link" class="col-md-4 col-form-label text-md-right">twitter_link :</label>
                  <div class="col-md-6">
                      <input id="twitter_link" type="text" class="form-control{{ $errors->has('twitter_link') ? ' is-invalid' : '' }}" name="twitter_link" value="{{$shop->twitter_link}}"  required autofocus>

                      @if ($errors->has('twitter_link'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('twitter_link') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="quotes" class="col-md-4 col-form-label text-md-right">quotes :</label>
                  <div class="col-md-6">
                       <textarea id="quotes" class="form-control{{ $errors->has('quotes') ? ' is-invalid' : '' }}" name="quotes" required autofocus  rows="3">{{$shop->quotes}}</textarea>
                       
                      @if ($errors->has('quotes'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('quotes') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="terms" class="col-md-4 col-form-label text-md-right">terms :</label>
                  <div class="col-md-6">
                       <textarea id="terms" class="form-control{{ $errors->has('terms') ? ' is-invalid' : '' }}" name="terms" required autofocus  rows="3">{{$shop->terms}}</textarea>
                       
                      @if ($errors->has('terms'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('terms') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

            
              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o" style="font-size:18px"></i>
                          {{ __('Edit!') }}
                      </button>
                  </div>
              </div>
          </form>



          <!-- Visual Part -->

          <form method="POST" action="{{action('SettingsController@editVisual')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                    <label for="logo" class="col-md-4 col-form-label text-md-right"> logo </label>
                        <img src="{{ $shop->logo }}" height="200px" width="200px" >
                          <div class="col-md-6">
                             <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}">

                            @if ($errors->has('logo'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                             @endif
                    </div>
              </div>
              @for ($i=1;$i<=3;$i++)
                <div class="form-group row">
                    <label for="{{"slide" . $i}}" class="col-md-4 col-form-label text-md-right"> {{"slide" . $i}} </label>
                        @if ($i <= count($slides) && $slides[$i-1] != null)
                        <img src="{{ $slides[$i - 1] }}" title="{{ $slides[$i - 1] }}" height="200px" width="200px" >
                        @endif
                          <div class="col-md-6">
                             <input id="{{ "slide" . $i }}" type="file" class="form-control{{ $errors->has("slide" . $i ) ? ' is-invalid' : '' }}" name="{{"slide" . $i}}" value="{{ old( "slide" . $i) }}">

                            @if ($errors->has("slide" . $i))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first("slide" . $i) }}</strong>
                                </span>
                             @endif
                    </div>
              </div>
              @endfor
            
              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o" style="font-size:18px"></i>
                          {{ __('Edit!') }}
                      </button>
                  </div>
              </div>
          </form>

          <!-- Import/ Export part-->

          <a href="/admin/settings/export"><button type="button" class="btn btn-warning">Export Users</button></a>
          <h3>Import Users</h3>
          <form method="POST" action="{{action('SettingsController@import')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                    <label for="json" class="col-md-4 col-form-label text-md-right"> json </label>
                          <div class="col-md-6">
                             <input id="json" type="file" class="form-control{{ $errors->has('json') ? ' is-invalid' : '' }}" name="json" value="{{ old('json') }}">

                            @if ($errors->has('json'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('json') }}</strong>
                                </span>
                             @endif
                    </div>
              </div>
              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o" style="font-size:18px"></i>
                          {{ __('Edit!') }}
                      </button>
                  </div>
              </div>
          </form>

      </div>
@stop