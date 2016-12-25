@extends('layout.adminMaster')




@section('top')
         @include('admin.adminHeader')
@endsection




@section('content')

<div class="row">
	 
	
	@include('admin.adminSidebar')


		<div class="col-md-10">

		<div class="row">
		 		<form class="navbar-form navbar-left" action="{{ route('products.index') }}" method="GET">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search" name="search">
			        </div>
			        <button type="submit" class="btn btn-primary " id="search-btn">Submit</button>
			          {{csrf_field()}}
			    </form>
		 </div>

			<div class="row">

			<div class="head_sec">
				<h3>PRODUCT TABLE</h3>
			</div>
				  
				        
				  <table class="table ">
				    <thead>
				      
				        
				        <th>Title</th>
				        <th>Description</th>
				        <th><a href="{{ route('products.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Add Item</a></th>
				     
				    </thead>
				    <tbody>

				    @foreach($products as $product)
						<tr>
							
							<td>{{$product->product_name}}</td>
							<td>{{$product->product_detail}}</td>
							<td style="width: 14%;">

							<a href="{{ route('products.edit',$product->id) }}" class="btn btn-success edit-button	">edit</a> 

								
								{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}

								

								{!! Form::submit('Delete', ['class' => 'btn btn-danger del-button']) !!}

								{!! Form::close() !!}




							</td>
						</tr>
				    @endforeach

				    </tbody>
				  </table>
			</div>


		</div>

</div>



@endsection