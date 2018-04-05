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

	<link rel="stylesheet" href="<?php echo e(asset("assets/stylesheets/styles.css")); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/datatabes.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>">
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/dropzone.css')); ?>"> 
</head>
<body>

	<?php echo $__env->yieldContent('body'); ?>
	
	<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	<script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/datatables-init.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/th3hpbt.js')); ?>"></script>
</body>
</html>