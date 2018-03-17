@extends('layouts.dashboard')
@section('page_heading','Edit Categories')
@section('section')

      <div class="card-body">
          <form method="POST" >
              @csrf
              <!-- Make sure to make this more dynamic, refactor it later -->

              <!--------------------- Name-------------------->
              <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-right">Name :</label>

                  <div class="col-md-3">
                      <input id="name" type="text" name="name"  required autofocus>

                     
                  </div>
              </div>

              <!------------------ID-------------------------->

               <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-right">ID :</label>

                  <div class="col-md-2">
                    <input id="id" type="text" name="id"  required autofocus>  
                  </div>
              </div>
          
              <!--------------- Parent category---------------->
              <div class="form-group">
                <div class="form-group row">
                    <label for= "" class="col-md-2 col-form-label text-md-right">Parent Category:</label>
                    <div class="col-md-2">
                      <div class="form-group">
                         <select class="form-control" id="sel1">
                          
                          </select>    
                    </div>
                </div>
              </div>

              <!----------------- Description------------------>

              <div class="form-group row">
                  <label for="description" class="col-md-2 col-form-label text-md-right">Description :</label>
                  <div class="col-md-4">
                       <textarea id="description" name="description"  required autofocus  rows="3"></textarea>
                      
                  </div>
              </div>
              
             <!------------------ Picture-------------------->
              <div class="form-group ">
                <div class="form-group row">
                  <label for="picture" class="col-md-2 col-form-label text-md-right">Picture :</label>

                  <div class="col-md-3">
                      <input id="picture" type="file"   required autofocus>

                  </div>
                </div>
              </div>

            <!----------------- Edit Button------------------------>
              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-success">
                        <i class="fa fa-check-square-o" style="font-size:18px"></i>
                          {{ __('EDIT') }}
                      </button>
                  </div>
              </div>

          </form>
      </div>
@stop
