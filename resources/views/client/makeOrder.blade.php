@extends('layout.master')


@section('top')
	@include('client.clientHeader')
@endsection



@section('content')

<div class="col-md-6">
	
	{!! Form::open(array('route'=>'client.postMakeOrder')) !!}


				{{ Form::label('productName', 'Product Name') }}
				<select class="form-control" name="productName">
					@foreach($products as $product)
						<option>{{ $product->product_name }}</option>
					@endforeach

				</select>

               {{ Form::label('quantity', 'quantity')}}
               {{ Form::text('quantity', null,array('class'=>'form-control'))}}


               {{Form::submit('Order',array('class'=>'btn btn-success'))}}

		{!! Form::close() !!}
</div>




@endsection