@extends('layout.adminMaster')




@section('top')
 @include('admin.adminHeader')
@endsection



@section('content')

<div class="row">
	@include('admin.adminSidebar')

	<div class="col-md-10">
		{!! Form::model($product, ['route' => ['products.update', $product->id], 'method'=>'PUT']) !!}
				<div class="row">
						
						<div class="col-md-8"> 
							{{ Form::label('product_name', 'Title:') }}
							{{ Form::text('product_name', null, ["class" => 'form-control input-lg']) }}
							
							{{ Form::label('product_detail', "Description", ['class' => 'form-spacing-top']) }}
							{{ Form::textarea('product_detail', null, ['class' => 'form-control']) }}
						 </div> 
					
				</div>


				<div class="row">
					
						<div class="col-md-3">
							
							{{Form::submit('Update',['class' => 'btn btn-success btn-block'])}}
							
							

							{!! Html::linkRoute('products.show', 'Cancel', array($product->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
				</div>
		{!! Form::close() !!}
	</div>
</div>




@endsection