@extends('layout.adminMaster')



@section('top')
         @include('admin.adminHeader')
@endsection







@section('content')
	@include('admin.adminSidebar')


	<div class="col-md-6">
		<div class="head_sec">
			<h3>Employee Added</h3>
			
		</div>
		<div class="">


			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Employee Name</h3>
			  </div>
			  <div class="panel-body">
			   {{$employee->employee_name}}
			  </div>
			</div>

			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Department Name</h3>
			  </div>
			  <div class="panel-body">
			    {{$employee->department->department_name}}
			  </div>
			</div>



			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Job Title</h3>
			  </div>
			  <div class="panel-body">
			   {{$employee->job->job_title}}
			  </div>
			</div>


		</div>
			<a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-success edit-button	">edit</a>
	</div>








@endsection