@extends('layout.adminMaster')

@section('top')
         @include('admin.adminHeader')
@endsection


@section('content')

@include('admin.adminSidebar')

		<div class="col-md-10">



		<div class="row">
		 		<form class="navbar-form navbar-left" action="{{ route('factories.index') }}" method="GET">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search" name="search">
			        </div>
			        <button type="submit" class="btn btn-primary " id="search-btn">Submit</button>
			          {{csrf_field()}}
			    </form>
		 </div>

			<div class="row">
			<div class="head_sec">
				<h3>FACTORY TABLE</h3>
			</div>
				
				        
				<table class="table ">
				    <thead>
				       
				        
				        <th>Factory Code</th>
				        <th>Postal Code</th>
				        <th>City</th>
				        <th>Country</th>
				        <th><a href="{{ route('factories.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Add </a></th>
				     
				    </thead>
				    <tbody>
				    @foreach($factories as $factory)
						<tr>
							
							<td>{{$factory->factory_code}}</td>
							<td>{{$factory->location->postal_code}}</td>
							<td>{{$factory->location->city}}</td>
					        <td>{{$factory->location->country}}</td>
							<td style="width: 16%;">
								<a href="{{ route('factories.edit',$factory->id) }}" class="btn btn-success edit-button	">edit</a> 
								{!! Form::open(['route' => ['factories.destroy', $factory->id], 'method' => 'DELETE']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger del-button']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
				    @endforeach

				    </tbody>
				</table>
			</div>
		</div>

@endsection