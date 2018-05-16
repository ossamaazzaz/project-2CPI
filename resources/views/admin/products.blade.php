<?php  /*
procusts
*/
?>
@extends('layouts.dashboard')
@section('page_heading','Products Manager')
@section('section')
<div class="col-sm-50"> 
<div class="row">
            <div class="col-sm-10">
            @section ('atable_panel_body')
            <?php  /*
            i used here a widget table /widget/table.blade.php
            */
            ?>
            @include('widgets.productsTable')
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
        </div>
    </div>
</div>
@stop