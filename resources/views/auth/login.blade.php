  <!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Title</title>
  <!--Link-->
  <link href="{{asset('css/bootstrap.min.css')      }} " rel="stylesheet"/>
  <link href="{{ asset('css/normalize.min.css')     }} " rel="stylesheet"/>
  <link href="{{ asset('css/login_signup.css')      }} " rel="stylesheet"/>
  <link href="{{ asset('css/font-awesome.min.css')  }} " rel="stylesheet"/>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'/>
  <style>
    .alert{
      background-color: #2ecc71;
      color: white;
      font-size: 18px;
    }
    .checkbox{
      color: white;
    }
  </style>
</head>

<body>

  <a id="return-home" style="color:white" href="/home"><i class="fa fa-home"></i></a>
  <div class="form" >
      <div class="tab-content">
        @if(session()->has('success'))
            <div class="alert alert-success"  role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <h1>Bienvenue !</h1>
        <form method="POST" action="{{ route('login') }}">

            <div class="field-wrap">
              <label for="email">{{ __('Adresse E-mail') }}<span class="req">*</span></label>
              <input id="email" type="email" value="{{ old('email') }}" name="email" class="login-input{{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="off" required autofocus/>
              @if ($errors->has('email'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="field-wrap">
              <label for="password" >{{ __('Mot de passe') }}<span class="req">*</span></label>
              <input id="password" name="password" type="password"  class="login-input{{ $errors->has('password') ? ' is-invalid' : '' }}" required autocomplete="off"/>
              @if ($errors->has('password'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <p class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember-me" style="margin-right:5px;"/>
               {{ __('Se souvenir de moi') }}
            </p>
            <p class="forgot"><a href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }} </a></p>
            <button type="submit" class="button button-block"/>{{ __('Connection') }}</button>
        </form>
      </div><!-- tab-content -->
</div> <!-- /form -->
  <!--script-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/login_signup.js') }}"></script>
  </body>
</html>
