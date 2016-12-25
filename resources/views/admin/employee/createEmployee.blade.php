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


				{{-- {{ Form::label('departmentName', 'Department Name') }}
               {{ Form::text('departmentName', null,array('class'=>'form-control'))}} --}}

		

				

				{{ Form::label('jobTitle', 'Job Title') }}
				<select class="form-control" name="jobTitle">
					@foreach($jobs as $job)
						<option >{{ $job->job_title }}</option>
						
					@endforeach

				</select>

				

               {{Form::submit('Add',array('class'=>'btn btn-success'))}}

		{!! Form::close() !!}
		
	</div>


</div>
@endsection