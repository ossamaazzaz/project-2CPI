<!--/*
procusts
*/
-->
@extends('layouts.dashboard')
@section('page_heading','Produits')
@section('title','Produits')
@section('section')
<div class="col-md-12"> 
<div class="row">
            <div class="col-md-12">
            @section ('atable_panel_body')
            <!--
            i used here a widget table /widget/table.blade.php
            */
            -->
            @include('widgets.productsTable')
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
        </div>
    </div>
</div>
@stop