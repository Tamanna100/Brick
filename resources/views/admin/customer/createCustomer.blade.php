@extends('layout.adminMaster')


@section('top')
         @include('admin.adminHeader')
@endsection


@section('content')


	@include('admin.adminSidebar')





	<div class=" col-md-6">


		{!! Form::open(array('route'=>'customers.store')) !!}
               				{{ Form::label('customer_name', 'Name') }}
							{{ Form::text('customer_name', null, ["class" => 'form-control input-lg']) }}

							{{ Form::label('gender', 'Gender') }}
							{{ Form::text('gender', null, ["class" => 'form-control input-lg']) }}


							{{ Form::label('age', 'Age') }}
							{{ Form::text('age', null, ["class" => 'form-control input-lg']) }}


							{{ Form::label('member_type', 'Member Type') }}
							{{ Form::text('member_type', null, ["class" => 'form-control input-lg']) }}


							{{ Form::label('company_name', 'Company Name') }}
							{{ Form::text('company_name', null, ["class" => 'form-control input-lg']) }}

               {{Form::submit('Add',array('class'=>'btn btn-success'))}}

		{!! Form::close() !!}
		
	</div>






@endsection