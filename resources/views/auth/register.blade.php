<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href="{{ asset('css/normalize.min.css')     }} " rel="stylesheet">
  <link href="{{ asset('css/login_signup.css')      }} " rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link href="{{ asset('css/font-awesome.min.css')  }} " rel="stylesheet">
</head>

<body>
  <div id="return-home"><i class="fa fa-home"></i></div>

  <div class="form" method="POST" action="{{ route('login') }}">

      <div class="tab-content">

            <h1>Inscription</h1>

          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

              <div>

                <input type="file" id="avatar" accept="image/*" capture style="display:none" onchange="loadImage(event)" class="login-input{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ old('avatar') }}"  />
                <center>
                  <img src="/storage/images/users/photo_profile.jpg" id="userImage" style="cursor:pointer" />
                </center>
              </div>


              <div class="field-wrap">
                <label for="username">Nom d'utilisateur<span class="req">*</span></label>
                <input id="username" type="text" name="username"   autocomplete="off" class="login-input{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" required autofocus />
                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>

              <div class="top-row">
                <div class="field-wrap">
                  <label for="firstName">Nom<span class="req">*</span></label>
                  <input id="firstName" type="text" name="firstName" class="login-input{{ $errors->has('firstName') ? ' is-invalid' : '' }}" value="{{ old('firstName') }}" autocomplete="off" required autofocus />
                  @if ($errors->has('firstName'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('firstName') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="field-wrap">
                  <label for="lastName">Prénom<span class="req">*</span></label>
                  <input id="lastName" type="text" class="login-input{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" autocomplete="off" required autofocus/>
                  @if ($errors->has('lastName'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('lastName') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="field-wrap">
                <label for="adr">Address<span class="req">*</span></label>
                <input id="adr" type="text" class="login-input{{ $errors->has('adr') ? ' is-invalid' : '' }}" name="adr" value="{{ old('adr') }}" autocomplete="off" required autofocus />
                @if ($errors->has('adr'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('adr') }}</strong>
                    </span>
                @endif
              </div>

              <div class="field-wrap">
                <label for="phoneNum">Numéro de mobile<span class="req">*</span></label>
                <input maxlength="10" id="phoneNum" type="text" class="login-input{{ $errors->has('phoneNum') ? ' is-invalid' : '' }}" name="phoneNum" value="{{ old('phoneNum') }}" autocomplete="off" required autofocus />
                @if ($errors->has('phoneNum'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('phoneNum') }}</strong>
                    </span>
                @endif
              </div>

              <div class="field-wrap">
                <label for="idCard">Numéro de carte d'identité<span class="req">*</span></label>
                <input id="idCard" type="text" class="login-input{{ $errors->has('idCard') ? ' is-invalid' : '' }}" name="idCard" value="{{ old('idCard') }}" autocomplete="off" required autofocus />
                @if ($errors->has('idCard'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('idCard') }}</strong>
                    </span>
                @endif
              </div>

              <div class="field-wrap">
                  <label for="adr">Adresse E-mail<span class="req">*</span></label>
                  <input id="email" type="email" class="login-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus />
                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="field-wrap">
                  <label for="password">{{ __('Mot de passe') }}<span class="req">*</span></label>
                  <input id="password" type="password" class="login-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  autocomplete="off" required autofocus />
                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="field-wrap">
                  <label for="password-confirm">{{ __('Comfirmer le mot de passe') }}<span class="req">*</span></label>
                  <input id="password-confirm" type="password" class="login-input" name="password_confirmation"  autocomplete="off" required autofocus/>
              </div>

              <input type="checkbox" required id="remember-me" style="margin:0px 5px 5px 0px;"/>En appuyant sur Inscription, vous acceptez <a href=""><b>nos Conditions générales</b></a> , notre Politique d'utilisation des données et notre Politique d'utilisation des cookies.
              <br>
              <button type="submit" class="button button-block"/>{{ __('Inscription') }}</button>
          </form>
      </div><!-- tab-content -->
    </div> <!-- /form -->
    <!--script-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/login_signup.js') }}"></script>
    <script src="{{ asset('js/intro.js') }}"></script>
  </body>
</html>
