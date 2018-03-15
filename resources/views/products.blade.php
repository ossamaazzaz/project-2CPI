<?php  /*
this the Dashbaord home view
*/
?>
@extends('layouts.dashboard')
@section('page_heading','Products')
@section('section')

 <div class="main">
                <button class="btn btn-primary">add new</button>
                                <div class="table-responsive m-t-40">
                                    <table id="productsTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>quantity</th>
                                                <th>quantitySale</th>
                                                <th>Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
												for ($i = 0; $i <= 15; $i++) {
												    echo '
												     <tr>
                                                <td class="showTools"> product
                                                    <div class="tools">
                                                        <a href=""><i class="fa fa-edit"></i></a>
                                                        <a href=""><i class="fa fa-times"></i></a>
                                                    </div>
                                                </td>
                                               
                                                <td>product</td>
                                                <td>product</td>
                                                <td>product</td>
                                                <td>product</td>
                                                <td>product</td>
                                                <td>product</td>
                                                <td>product</td>
                                                <td>product</td>
                                                </tr> 
                                            ';
												}
												?> 
                                        </tbody>
                                    </table>
                                </div> 
  
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/datatables.min.js') }}"></script>
     <script src="{{ asset('js/datatables-init.js') }}"></script>



@stop