@extends('layout.master')


@section('top')
	@include('client.clientHeader')
@endsection



@section('content')


	<table class="table ">
				    <thead>
				      
				        
				        <th>Product Name</th>
				        <th>Quantity</th>
				        <th>Unit Price</th>
				        <th>Total Price</th>
				        <th><a href="" class="btn btn-primary btn-lg btn-block" role="button">Add </a></th>
				     
				    </thead>
				    <tbody>
				    {{-- @foreach($employees as $employee) --}}
						{{-- <tr>
							
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
						</tr> --}}
				   {{--  @endforeach --}}

				    </tbody>
				</table>


@endsection
