<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>Admin</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="<?php echo e(asset("assets/stylesheets/styles.css")); ?>" />

	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>">
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body>

	<?php echo $__env->yieldContent('body'); ?>

	 
	<script src="<?php echo e(asset("assets/scripts/frontend.js")); ?>" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo e(URL::to('js/users.js')); ?>"></script>
</body>
</html>