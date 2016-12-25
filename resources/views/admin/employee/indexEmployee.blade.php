@extends('layout.adminMaster')




@section('top')
         @include('admin.adminHeader')
@endsection




@section('content')

<div class="row">
	 
	
	@include('admin.adminSidebar')

		<div class="col-md-10">

		 <div class="row">
		 		<form class="navbar-form navbar-left" action="{{ route('employees.index') }}" method="GET">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search" name="search">
			        </div>
			        <button type="submit" class="btn btn-primary " id="search-btn">Submit</button>
			          {{csrf_field()}}
			    </form>
		 </div>


			<div class="row">

			<div class="head_sec">
				<h3>EMPLOYEE TABLE</h3>
			</div>
				
				        
				<table class="table ">
				    <thead>
				      
				        
				        <th>Name</th>
				        <th>Hire Date</th>
				        <th>Phone</th>
				        <th>Department</th>
				        <th>Manager</th>
				        <th>Job Title</th>
				        
				        <th>Salary</th>
				        <th><a href="{{ route('employees.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Add Employee</a></th>
				     
				    </thead>
				    <tbody>
				    @foreach($employees as $employee)
						<tr>
							
							<td>{{$employee->employee_name}}</td>
							<td>{{$employee->hire_date}}</td>
							<td>{{$employee->phone}}</td>
							

							{{-- <td>           
							 @foreach ($employee->department as $edepartment)
					                {{ $edepartment->department_name}}
					            @endforeach
					         </td> --}}
					        <td>{{$employee->department->department_name}}</td>
                			<td>{{$employee->department->manager}}</td>
							<td>{{$employee->job->job_title}}</td>
							<td>{{$employee->job->salary}}</td>
							<td style="width: 10%;">
								<a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-success edit-button	">edit</a> 
								{!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'DELETE']) !!}
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