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
		<!-- Modal style by Oussama Azzaz-->
		<style type="text/css">
		.modal-bg{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgb(0,0,0);
			background-color: rgba(0,0,0,0.5);
			z-index: 998;
			display: none;
		}
		.confir-modal-text{
			font-size: 25px;
			text-align: center;
			font-family: 'Source Sans Pro', sans-serif;
			color: #2c3e50;
			margin: 60px;
		}
		.confir-modal{
			width: 400px;
			height: 200px;
			background-color: #ecf0f1;
			position: fixed;
			z-index: 999;
			display: none; 
			box-shadow: 5px 10px 18px #535c68;
			border-radius: 7px; 
			top:0;
		    bottom: 0;
		    left: 0;
		    right: 0;
		    margin: auto;
		}
		.yes{
			bottom: 0;
			left: 0;
			width: 50%;
			display: inline;
			position: absolute;
			cursor: pointer;
			background-color: #636e72;
			border: 0;
			border-radius: 0;
			font-family: 'Changa', sans-serif;
			color: white;
			font-size: 24px;
			height: 70px; 
			padding: 17px;
		}
		.yes:hover{
			background-color: #05c46b;
		}
		.no{
			bottom: 0;
			right: 0;
			width: 50%;
			display: inline;
			position: absolute;
			cursor: pointer;
			background-color: #ff4d4d;
			border: 0;
			border-radius: 0;
			font-family: 'Changa', sans-serif;  
			color: white;
			font-size: 24px; 
			height: 70px;
			padding: 15px;
		}
		.no:hover{
			background-color: #ff5e57;
		}
		.close-confmodal {
		    color: #636e72;
		    float: right;
		    font-size: 35px;
		    font-weight: bold;
		    position: absolute;
		    top: 0px;
		    right: 20px;
		}
		.close-confmodal:hover,
		.close-confmodal:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		}

	</style>
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