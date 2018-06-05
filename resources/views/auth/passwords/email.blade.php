<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Title</title>
  <!--Link-->
  <link href="{{ asset('css/normalize.min.css')     }} " rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css')  }} " rel="stylesheet">
  <link href="{{ asset('css/login_signup.css')      }} " rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link href="{{ asset('css/responsive.css') }} " rel="stylesheet">
</head>
  <body>
    <div id="return-home"><i class="fa fa-home"></i></div>
      <div class="form" method="POST" action="{{ route('login') }}">
      <div class="tab-content">
           <h1>Réinitialiser le mot de pass</h1>
           <form method="POST" action="{{ route('password.email') }}">
               @csrf
              <div class="field-wrap">
                <label for="email">{{ __('Adresse E-mail') }}<span class="req">*</span></label>
                <input id="email" type="email" class="login-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"   autocomplete="off"  required></input>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <button type="submit" class="button button-block" style="font-size: 24px;text-transform: none;" />{{ __('Envoyer lien de réinitialisation') }}</button>
            </form>
      </div><!-- tab-content -->
    </div>
    <!--script-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/login_signup.js') }}"></script>
  </body>
</html>
