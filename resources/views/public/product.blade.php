@extends('layout.master')

@section('top')
	@include('includes.header')
@endsection



@section('content')
	<div class="container">
    <div class="row">
    
@foreach($products as $product)
        <div class="col-sm-4 col-md-4">

            <div class="post">
                <div class="post-img-content">
                </div>
                        
                     
                        <div class="content-header">
                            <h3>{{$product->product_name}}</h3>
                        </div>
                        <div class="content">
                            
                            <p>{{$product->product_detail}}</p>
                               
                            
                            <div>
                                <a href="" class="btn btn-warning btn-sm">Read more</a>
                            </div>
                        </div>
                   
            </div>
        </div>

    
        


         @endforeach


    </div>
</div>

@endsection