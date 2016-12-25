@extends('layout.adminMaster')



@section('top')
         @include('admin.adminHeader')
@endsection







@section('content')
	@include('admin.adminSidebar')


	<div class="col-md-10">
		<div class="head_sec">
			<h3>{{$product->product_name}}</h3>
		</div>
		<div class="detail_sec">
			<p>{{$product->product_detail}}</p>
		</div>
		<a href="{{ route('products.edit',$product->id) }}" class="btn btn-success edit-button	">edit</a>
	</div>






@endsection