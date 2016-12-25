@extends('layout.adminMaster')





@section('top')
 @include('admin.adminHeader')
@endsection



@section('content')

<div class="row">
	@include('admin.adminSidebar')

	<div class="col-md-6">
		{!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method'=>'PUT']) !!}

				<div class="row">
						
						<div class="col-md-8"> 
							{!! Form::open(array('route'=>'employees.store')) !!}
			               {{ Form::label('employee_name', 'name')}}
			               {{ Form::text('employee_name', null,array('class'=>'form-control'))}}

			                {{ Form::label('hire_date', 'Hire date')}}
			               {{ Form::text('hire_date', null,array('class'=>'form-control'))}}

			                {{ Form::label('phone', 'Phone')}}
			               {{ Form::text('phone', null,array('class'=>'form-control'))}}



							{{ Form::label('departmentName', 'Department Name') }}
							<select class="form-control" name="departmentName">
								@foreach($departments as $department)
									<option>{{ $department->department_name }}</option>
								@endforeach

							</select>

							{{ Form::label('jobTitle', 'Job Title') }}
							<select class="form-control" name="jobTitle">
								@foreach($jobs as $job)
									<option >{{ $job->job_title }}</option>
									
								@endforeach

							</select> 

							<div class="col-md-5">
							
							{{Form::submit('Update',['class' => 'btn btn-success btn-block'])}}
							
							

							{!! Html::linkRoute('employees.show', 'Cancel', array($employee->id), array('class' => 'btn btn-danger btn-block')) !!}
						
					
				</div>


			

				

               

		{!! Form::close() !!}
	</div>
</div>
		
@endsection


