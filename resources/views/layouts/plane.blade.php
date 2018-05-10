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
    <link href="{{ asset('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="{{ asset('css/lib/calendar2/semantic.ui.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    
    <link href="{{ asset('css/spinners.css')}}" rel="stylesheet">
    <link href="{{ asset('css/helper.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
	@yield('body')


  <!-- OLDER SCRIPTS -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="asset('js/jquery.min.js') }}"></script> 
    <script src="asset('js/app.js') }}"></script>
    <script src=" asset('js/datatables.min.js') }}"></script>
    <script src=" asset('js/datatables-init.js') }}"></script> -->
    <script src="{{ asset('js/th3hpbt.js')}}"></script>
    <script src="{{ asset('js/searchresult.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
	
	<!-- All Jquery -->
    <script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('js/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="{{ asset('js/lib/morris-chart/raphael-min.js') }}"></script>
    <script src="{{ asset('js/lib/morris-chart/morris.js') }}"></script>
    <script src="{{ asset('js/lib/morris-chart/dashboard1-init.js') }}"></script>


	<script src="{{ asset('js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('js/lib/calendar-2/semantic.ui.min.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('js/lib/calendar-2/prism.min.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('js/lib/calendar-2/pignose.init.js') }}"></script>

    <script src="{{ asset('js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <script src="{{ asset('Chart.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- scripit init-->

    <script src="{{ asset('js/custom.min.js') }}"></script>
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

</body>
</html>