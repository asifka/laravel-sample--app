@extends('layouts.master')
@section('title','New User')
@section('content')
<div class="container">
    <form action="{{ route('save.user') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name">
        @error('name') <p class="alert-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        @error('email') <p class="alert-danger">{{ $message }}</p> @enderror
    </div>
    <div class="form-group">
        <label>Date of Birth</label>
        <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="DOB">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select  class="form-control" name="status" id="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select> 
       
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>   
@endsection