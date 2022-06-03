@extends('layouts.master')
@section('title','edit User')
@section('content')
<div class="container">
    <form action="{{ route('update.user') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value={{ encrypt($user->user_id) }} >
    <div class="form-group">
        <label>Name</label>
        <input type="text" value="{{ $user->name }}" class="form-control" name="name" id="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" value="{{ $user->email }}" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label>Date of Birth</label>
        <input type="text" value="{{ $user->date_of_birth_formatted }}" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="DOB">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select  class="form-control" name="status" id="status">
            <option value="1" @if($user->status== 1) selected ="selected" @endif>Active</option>
            <option value="0" @if($user->status== 0) selected ="selected" @endif>Inactive</option>
        </select> 
       
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>   
@endsection