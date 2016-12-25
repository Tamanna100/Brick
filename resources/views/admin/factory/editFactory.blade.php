@extends('layout.adminMaster')




@section('top')
 @include('admin.adminHeader')
@endsection



@section('content')

<div class="row">
	@include('admin.adminSidebar')

	<div class="col-md-10">
		{!! Form::model($factory, ['route' => ['factories.update', $factory->id], 'method'=>'PUT']) !!}
				<div class="row">
						
						<div class="col-md-8"> 
							{{ Form::label('factory_code', 'Factory Code') }}
							{{ Form::text('factory_code', null, ["class" => 'form-control input-lg']) }}
							
							{{ Form::label('postalCode', "postal code", ['class' => 'form-spacing-top']) }}
							{{ Form::text('postalCode', null, ["class" => 'form-control input-lg']) }}
						 </div> 
					
				</div>


				<div class="row">
					
						<div class="col-md-3">
							
							{{Form::submit('Update',['class' => 'btn btn-success btn-block'])}}
							
							

							{!! Html::linkRoute('factories.show', 'Cancel', array($factory->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
				</div>
		{!! Form::close() !!}
	</div>
</div>




@endsection