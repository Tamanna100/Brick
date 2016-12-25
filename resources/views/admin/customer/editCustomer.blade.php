@extends('layout.adminMaster')




@section('top')
 @include('admin.adminHeader')
@endsection



@section('content')

<div class="row">
	@include('admin.adminSidebar')

	<div class="col-md-10">
		{!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method'=>'PUT']) !!}
				<div class="row">
						
						<div class="col-md-8"> 
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
							

						 </div> 
					
				</div>


				<div class="row">
					
						<div class="col-md-3">
							
							{{Form::submit('Update',['class' => 'btn btn-success btn-block'])}}
							
							

							{!! Html::linkRoute('customers.show', 'Cancel', array($customer->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
				</div>
		{!! Form::close() !!}
	</div>
</div>




@endsection