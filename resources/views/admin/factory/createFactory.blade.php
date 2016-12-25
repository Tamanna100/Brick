@extends('layout.adminMaster')

@section('top')
<div id="admin-body">
	    @include('admin.adminHeader')
</div>
     
@endsection


@section('content')

<div id="admin-body">
	@include('admin.adminSidebar')

	<div class=" col-md-6">


		{!! Form::open(array('route'=>'factories.store')) !!}
               {{ Form::label('factory_code', 'Factory Code')}}
               {{ Form::text('factory_code', null,array('class'=>'form-control'))}}

                {{ Form::label('postalCode', 'Postal Code')}}
               {{ Form::text('postalCode', null,array('class'=>'form-control'))}}

               {{Form::submit('Add',array('class'=>'btn btn-success'))}}

		{!! Form::close() !!}
		
	</div>


</div>
@endsection