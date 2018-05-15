<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('css/lib/bootstrap/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo e(asset('css/lib/calendar2/semantic.ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/lib/calendar2/pignose.calendar.min.css')); ?>" rel="stylesheet">
    
    <link href="<?php echo e(asset('css/spinners.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/helper.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<?php
/*
	<!-- IF ICONS/STYLE ISN'T RIGHT, COMEBACK TO THIS-->
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/datatabes.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">  
	*/
?>
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

<body class="fix-header fix-sidebar">
	<?php echo $__env->yieldContent('body'); ?>

	
	<!-- All Jquery -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('js/lib/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('js/sidebarmenu.js')); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo e(asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="<?php echo e(asset('js/lib/morris-chart/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/morris-chart/morris.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/morris-chart/dashboard1-init.js')); ?>"></script>


	<script src="<?php echo e(asset('js/lib/calendar-2/moment.latest.min.js')); ?>"></script>
    <!-- scripit init-->
    <script src="<?php echo e(asset('js/lib/calendar-2/semantic.ui.min.js')); ?>"></script>
    <!-- scripit init-->
    <script src="<?php echo e(asset('js/lib/calendar-2/prism.min.js')); ?>"></script>
    <!-- scripit init-->
    <script src="<?php echo e(asset('js/lib/calendar-2/pignose.calendar.min.js')); ?>"></script>
    <!-- scripit init-->
    <script src="<?php echo e(asset('js/lib/calendar-2/pignose.init.js')); ?>"></script>

    <script src="<?php echo e(asset('js/lib/owl-carousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/owl-carousel/owl.carousel-init.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <!-- scripit init-->

    <script src="<?php echo e(asset('js/custom.min.js')); ?>"></script>
      <script type="text/javascript">
        
      $('.counter').each(function() {
      var $this = $(this),
          countTo = $this.attr('data-count');
      
      $({ countNum: $this.text()}).animate({
        countNum: countTo
      },
      {
        duration: 1500,
        easing:'linear',
        step: function() {
          $this.text(Math.floor(this.countNum));
        },
        complete: function() {
          $this.text(this.countNum);
          //alert('finished');
        }

      });  
    });
        var ctxx = document.getElementById('users-chart').getContext('2d');
      var chart = new Chart(ctxx, {
          // The type of chart we want to create
          type: 'line',
          // The data for our dataset
          data: {
              labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet","Août","Septembre","Octobre","Novembre","Décembre"],
              datasets: [{
                  label: "Users registrations this year",
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  data: [0, 10, 5, 2, 20, 30, 12,15, 10, 5, 2, 20, 30, 45],
              }]
          },
          // Configuration options go here
          options: {}
      });
     
    </script>
    <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables-init.js')); ?>"></script>
    <script src="<?php echo e(asset('js/th3hpbt.js')); ?>"></script>
    <script src="<?php echo e(asset('js/searchresult.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pagination.js')); ?>"></script>
    <script src="<?php echo e(asset('js/cart.js')); ?>"></script>

</body>
</html>