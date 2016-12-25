@extends('layout.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h4>investor profile</h4>
		<a href="{{ route('user.logout')}}"><span class="glyphicon glyphicon-user"></span>log out</a>
	
	</div>
</div>
@endsection