@extends('layout.adminMaster')


@section('top')
         @include('admin.adminHeader')
@endsection


@section('content')


	@include('admin.adminSidebar')





	<div class=" col-md-6">


		{!! Form::open(array('route'=>'products.store')) !!}
               {{ Form::label('product_name', 'Title')}}
               {{ Form::text('product_name', null,array('class'=>'form-control'))}}


               {{ Form::label('product_detail', 'Description')}}
               {{ Form::textarea('product_detail', null,array('class'=>'form-control'))}}

               {{Form::submit('Add',array('class'=>'btn btn-success'))}}

		{!! Form::close() !!}
		
	</div>






@endsection