<?php  /*
Users manager view 
its used to show up the users table
*/
?>
@extends('layouts.dashboard')
@section('page_heading','Utilisateurs')
@section('title','Utilisateurs')
@section('section')
<div class="col-sm-50">	
<div class="row">
		<div class="col-md-12">
			@section ('atable_panel_body')
			<?php  /*
			i used here a widget table /widget/table.blade.php
			*/
			?>
			@include('widgets.table')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'atable'))
		</div>
	</div>
</div>
@stop