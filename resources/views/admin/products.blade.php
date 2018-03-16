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
                                                <th></th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>quantity</th>
                                                <th>quantitySale</th>
                                                <th>Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($products as $product)
											    <tr>
                                                    <td></td>
                                                    <td class="showTools"> {{ $product->id }}
                                                        <div class="tools">
                                                            <a href=""><i class="fa fa-edit"></i></a>
                                                            <a href=""><i class="fa fa-times"></i></a>
                                                        </div>
                                                    </td>
                                                   
                                                    <td>{{ $product->name }}</td>
                                                    <td>image</td>
                                                    <td>{{ $product->brand }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->categoryId }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->quantitySale }}</td>
                                                    <td>rate</td>
                                                </tr>
                                                @endforeach 
                                        </tbody>
                                    </table>
                                </div> 
  
     <script src="{{ asset('js/datatables.min.js') }}"></script>
     <script src="{{ asset('js/datatables-init.js') }}"></script>
@stop