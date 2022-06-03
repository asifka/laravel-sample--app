@extends('layouts.master')
@section('title','Login')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
  <div class="card border-0 shadow rounded-3 my-5">
    <div class="card-body p-4 p-sm-5">
  <h5 class="card-title text-center mb-5 fw-light fs-5">User Login</h5>
    @if(session()->has('message'))<h6>{{ session()->get('message')}}</h6>@endif
<form action="{{route('do.login')}}" method="post">
    @csrf
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name ="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
 
</form>
</div>
</div>
</div>
</div>
</div>

@endsection