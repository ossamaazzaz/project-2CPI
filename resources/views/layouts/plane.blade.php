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
{{-- 	<meta name="csrf-token" content="{{ csrf_token() }}">
 --}}
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/datatabes.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

	@yield('body')
	
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/datatables.min.js') }}"></script>
	<script src="{{ asset('js/datatables-init.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/th3hpbt.js') }}"></script>
</body>
</html>