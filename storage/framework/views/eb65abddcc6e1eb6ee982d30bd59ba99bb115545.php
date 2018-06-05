  <!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Title</title>
  <!--Link-->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?> " rel="stylesheet"/>
  <link href="<?php echo e(asset('css/normalize.min.css')); ?> " rel="stylesheet"/>
  <link href="<?php echo e(asset('css/login_signup.css')); ?> " rel="stylesheet"/>
  <link href="<?php echo e(asset('css/font-awesome.min.css')); ?> " rel="stylesheet"/>
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
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success"  role="alert">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>
        <h1>Bienvenue !</h1>
        <form method="POST" action="<?php echo e(route('login')); ?>">

            <div class="field-wrap">
              <label for="email"><?php echo e(__('Adresse E-mail')); ?><span class="req">*</span></label>
              <input id="email" type="email" value="<?php echo e(old('email')); ?>" name="email" class="login-input<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" autocomplete="off" required autofocus/>
              <?php if($errors->has('email')): ?>
                  <span class="invalid-feedback">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                  </span>
              <?php endif; ?>
            </div>
            <div class="field-wrap">
              <label for="password" ><?php echo e(__('Mot de passe')); ?><span class="req">*</span></label>
              <input id="password" name="password" type="password"  class="login-input<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required autocomplete="off"/>
              <?php if($errors->has('password')): ?>
                  <span class="invalid-feedback">
                      <strong><?php echo e($errors->first('password')); ?></strong>
                  </span>
              <?php endif; ?>
            </div>
            <p class="checkbox"><input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> id="remember-me" style="margin-right:5px;"/>
               <?php echo e(__('Se souvenir de moi')); ?>

            </p>
            <p class="forgot"><a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Mot de passe oublié ?')); ?> </a></p>
            <button type="submit" class="button button-block"/><?php echo e(__('Connection')); ?></button>
        </form>
      </div><!-- tab-content -->
</div> <!-- /form -->
  <!--script-->
  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/login_signup.js')); ?>"></script>
  </body>
</html>
