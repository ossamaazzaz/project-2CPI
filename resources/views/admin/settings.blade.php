@extends('layouts.dashboard')
@section('page_heading','Paramètres')
@section('title','Paramètres')
@section('section')
<style type="text/css">
   .center-text-image{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transition: .5s ease;
      opacity: 0;
   }
   .img-cont{
      position: relative;
   }
   .container:hover .settings-img {
    opacity: 0.3;
  }

  .container:hover .center-text-image {
    opacity: 1;
  }
  .settings-img{
    width: 200px;
    height: 200px;
    transition: .5s ease;
  }

</style>
      <div class="card">
        <div class="main-settings">
          <center>
            <input id="tab1" type="radio" name="tabs" checked class="tabs-input">
            <label for="tab1" class="tabs-label" >Générale</label>
              
            <input id="tab2" type="radio" name="tabs" class="tabs-input">
            <label for="tab2" class="tabs-label">Apparence </label>
              
            <input id="tab3" type="radio" name="tabs" class="tabs-input">
            <label for="tab3" class="tabs-label" >Importe-Exporte</label>
              

           
            <section id="content1">
              <form method="POST" action="{{ action('SettingsController@editText') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
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
                  <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
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
                  <label for="link" class="col-md-4 col-form-label text-md-right">Lien</label>
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
                  <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
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
                  <label for="addr" class="col-md-4 col-form-label text-md-right">Addresse</label>
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
                  <label for="phone_num" class="col-md-4 col-form-label text-md-right">Tél</label>
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
                  <label for="fb_link" class="col-md-4 col-form-label text-md-right">Facebook</label>
                  <div class="col-md-6">
                      <input id="fb_link" type="text" class="form-control{{ $errors->has('fb_link') ? ' is-invalid' : '' }}" name="fb_link" value="{{$shop->fb_link}}" autofocus>

                      @if ($errors->has('fb_link'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('fb_link') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="insta_link" class="col-md-4 col-form-label text-md-right">Instagram</label>
                  <div class="col-md-6">
                      <input id="insta_link" type="text" class="form-control{{ $errors->has('insta_link') ? ' is-invalid' : '' }}" name="insta_link" value="{{$shop->insta_link}}"  autofocus>

                      @if ($errors->has('insta_link'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('insta_link') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="twitter_link" class="col-md-4 col-form-label text-md-right">Twitter</label>
                  <div class="col-md-6">
                      <input id="twitter_link" type="text" class="form-control{{ $errors->has('twitter_link') ? ' is-invalid' : '' }}" name="twitter_link" value="{{$shop->twitter_link}}"  autofocus>

                      @if ($errors->has('twitter_link'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('twitter_link') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="quotes" class="col-md-4 col-form-label text-md-right">Quotes</label>
                  <div class="col-md-6">
                       <textarea id="quotes" class="form-control{{ $errors->has('quotes') ? ' is-invalid' : '' }}" name="quotes" autofocus  data-role="tagsinput" rows="3">{{$shop->quotes}}</textarea>
                      @if ($errors->has('quotes'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('quotes') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              
                  <div class="form-group row">
                    <label for="terms" class="col-md-3 col-form-label">Terms and Conditions</label>
                    <div class="col-md-8">
                         <textarea id="terms" class="form-control{{ $errors->has('terms') ? ' is-invalid' : '' }}" name="terms" required autofocus  rows="15" style="width:100%">{{$shop->terms}}</textarea>
                         
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
                          Modifier
                      </button>
                  </div>
              </div>
              </form>
            </section>
              
            <section id="content2">
               <!-- Visual Part -->
               <form method="POST" action="{{action('SettingsController@editVisual')}}" enctype="multipart/form-data">
               <div class="container">

                 <div class="row">
                   <div class="col-md-3" style="border-right: 3px dotted #ccc;" class="img-cont">
                     <h4>Logo</h4>
                     <img src="{{ $shop->logo }}" class="settings-img" id="logo-img">
                     <a class="btn btn-primary center-text-image blue-btn" onclick="clickInput('logoInput')" >
                         Changement du Logo
                     </a>  
                     <input type="file" accept="image/*" class="hidden" id="logoInput" onchange="loadImage(event,'logo-img')" class="hidden{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" value="{{ old('logo') }}">

                    @if ($errors->has('logo'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('logo') }}</strong>
                        </span>
                     @endif
                   </div>


                   <div class="col-md-3" style="border-right: 3px dotted #ccc;" class="img-cont">
                     <h4>Slide 1</h4>
                     @if (count($slides)>=1)
                     <img src="{{ $slides[0] }}" class="settings-img" id="slide1-img">
                     @else
                     <img src="" class="settings-img" id="slide1-img">
                     @endif
                     <a class="btn btn-primary center-text-image blue-btn" onclick="clickInput('slide1')">
                         Changement du Slide
                     </a>  
                     <input type="file" id="slide1" accept="image/*" class="hidden{{ $errors->has("slide1") ? ' is-invalid' : '' }}" onchange="loadImage(event,'slide1-img')" name="slide1" value="{{ old("slide3") }}">
                      @if ($errors->has("slide1"))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first("slide1") }}</strong>
                              </span>
                      @endif
                   </div>


                   <div class="col-md-3" style="border-right: 3px dotted #ccc;" class="img-cont">
                     <h4>Slide 2</h4>
                     @if (count($slides)>=2)
                     <img src="{{ $slides[1] }}" class="settings-img" id="slide2-img">
                     @else
                     <img src="" class="settings-img" id="slide2-img">
                     @endif
                     <a class="btn btn-primary center-text-image blue-btn" onclick="clickInput('slide2')">
                         Changement du Slide
                     </a>  
                     <input type="file" id="slide2" accept="image/*" class="hidden{{ $errors->has("slide2") ? ' is-invalid' : '' }}" onchange="loadImage(event,'slide2-img')" name="slide2" value="{{ old("slide2") }}">
                      @if ($errors->has("slide2"))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first("slide2") }}</strong>
                                    </span>
                      @endif
                   </div>

                   <div class="col-md-3" class="img-cont">
                     <h4>Slide 3</h4>
                     @if (count($slides)>=3)
                     <img src="{{ $slides[2] }}" class="settings-img" id="slide3-img">
                     @else
                     <img src="" class="settings-img" id="slide3-img">
                     @endif
                     <a class="btn btn-primary center-text-image blue-btn" onclick="clickInput('slide3')">
                         Changement du Slide
                     </a>  
                     <input type="file" id="slide3" accept="image/*" class="hidden{{ $errors->has("slide3") ? ' is-invalid' : '' }}" onchange="loadImage(event,'slide3-img')" name="slide3" value="{{ old("slide3") }}">
                      @if ($errors->has("slide3"))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first("slide3") }}</strong>
                                    </span>
                      @endif

                                
                   </div>
                 
                 </div>
               </div><br><br>
                  <button type="submit" class="btn btn-primary blue-btn">
                    <i class="fa fa-check-square-o" style="font-size:18px"></i>
                      Enregistrer
                  </button>
               <!--
              
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
                -->
              </form>
            </section>
              
            <section id="content3">
              <!-- Import/ Export part-->
              <br><br>
          <div class="row">
            <div class="col-md-4">
              <h3>Exporter les utilisatuers :</h3>
            </div>
            <div class="col-md-1">
              <a href="/admin/settings/export"><button type="button" class="btn btn-warning">Exporter</button></a>
            </div>
          </div><br><br>
          <form method="POST" action="{{action('SettingsController@import')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <div class="col-md-4">
                    <h3>Importer des utilisateurs :</h3>
                </div>
                          <div class="col-md-4">
                             <input id="json" type="file" class="form-control{{ $errors->has('json') ? ' is-invalid' : '' }}" name="json" value="{{ old('json') }}" accept=".json">

                            @if ($errors->has('json'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('json') }}</strong>
                                </span>
                             @endif
                    </div>
                  <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-check-square-o" style="font-size:18px"></i>
                        Importer
                    </button>
                  </div>
              </div>
              
          </form>

            </section>
              
           </center>   
          </div>
          
      </div>
      <script type="text/javascript">
        function clickInput(id) {
          document.getElementById(id).click();
        }
        function loadImage(event,id) {
          var output = document.getElementById(id);
          output.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>
@stop