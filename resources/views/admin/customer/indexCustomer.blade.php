@extends('layout.adminMaster')




@section('top')
         @include('admin.adminHeader')
@endsection




@section('content')

<div class="row">
	 
	
	@include('admin.adminSidebar')


		<div class="col-md-10">

		<div class="row">
		 		<form class="navbar-form navbar-left" action="{{ route('customers.index') }}" method="GET">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search" name="search">
			        </div>
			        <button type="submit" class="btn btn-primary " id="search-btn">Submit</button>
			          {{csrf_field()}}
			    </form>
		 </div>


		<div class="row">
			<div class="head_sec order-table">
				<h3>CUSTOMER TABLE</h3>
			</div>
				       
				  <table class="table order-table">
				    <thead>
				      
				        
				        <th>Name</th>
				        <th>Gender</th>
				        <th>Age</th>
				        <th>Member Type</th>
				        <th>Company Name</th>
				        <th><a href="{{ route('customers.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Add </a></th>
				     
				    </thead>
				    <tbody>
					    @foreach($customers as $customer)
							<tr>
								
								<td>{{$customer->customer_name}}</td>
								<td>{{$customer->gender}}</td>
								<td>{{$customer->age}}</td>
								<td>{{$customer->member_type}}</td>
								<td>{{$customer->company_name}}</td>
								<td style="width: 14%;">
								<a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-success edit-button	">edit</a> 
									{!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'DELETE']) !!}

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