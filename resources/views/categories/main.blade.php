@extends('layouts.dashboard')
@section('page_heading','Categories Manager')
@section('section')


<div class="container">
  
   <div class="col-sm-3">  

      <!------------------- Add Categorie Button------------------>

      <a href="/categories/add">
       <button type="button" class="btn btn-success btn-success">Add Category </button>
      </a>

     </div>

   <!-------------------Research---------------------------->
   
        <div class="row">
         <div class="col-sm-6">
          <div class="input-group custom-search-form"  >        
                 <input type="text" size="" class="form-control" placeholder="Search..." >
                 <span class="input-group-btn" >
                      <button class="btn btn-default" type="button" >
                          <i class="fa fa-search" ></i>
                      </button>
                 </span>       
           <div>
        </div> 
      </div>
</div>
   </br></br>   

      
  <!------------------- show categories ---------------------->
 


<div class="container-fluid"> 
<div class="row">
    <div class="col-sm-10">
      @section ('atable_panel_title','Categories') 
      @section ('atable_panel_body')
      <?php  /*
      i used here a widget table /widget/TableCategories.blade.php
      */
      ?>
      @include('widgets.TableCategories', array('class'=>'table-condensed table-bordered table-striped table table-responsive'))
      @endsection
      @include('widgets.panel', array('header'=>true, 'as'=>'atable'))
    </div>
  </form>
</div>
</div>
 
 <br />



@stop
