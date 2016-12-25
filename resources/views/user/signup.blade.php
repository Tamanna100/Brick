
@extends('layout.master')


@section('top')
         @include('includes.header')
@endsection





@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1 id='sign'>Sign Up</h1>
   
    <form action="{{ route('user.signup') }}" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" placeholder="Email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="text" id="password" placeholder="password" name="password" class="form-control">
      </div>

            <div class="form-group">
              <label for="first_name">First name</label>
              <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
            </div>
            <div class="form-group">
              <label for="last_name">Last name</label>
              <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
            </div>


      <button type="submit" class="btn btn-primary">Sign Up</button>
      {{csrf_field()}}
    </form>
  </div>
</div>
@endsection


