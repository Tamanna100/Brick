
@extends('layout.master')

@section('top')
         @include('includes.header')
@endsection



@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1 id='sign'>Sign In</h1>
   
    <form action="{{ route('user.signin') }}" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="text" id="password" name="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
      {{csrf_field()}}
    </form>
  </div>
</div>
@endsection




