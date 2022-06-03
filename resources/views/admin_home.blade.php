@extends('layouts.master')
@section('title','Home')
@section('content')
{{-- <h1>{{ $name }}</h1>
<h1>Today is {{ date('d-M-Y') }}</h1>
@if($age==35)
<h1>allowed</h1>
@else
<h1>not allowed</h1>
@endif --}}
<h2>Users</h2>
{{session()->get('user_name')}}
<h2>{{session()->get('today')}}</h2>
@if(session()->has('message'))
  <p>{{ session()->get('message') }}</p>
@endif
<h4>{{ auth()->guard('admin')->user()->name}}</h4>
<a href="{{route('logout')}}"class="btn btn-danger">Logout</a>
<a href="{{ route('create.user') }}" class="btn btm-sm btn-primary" style="float: right">New</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">DOB</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
    <tr>
      <th scope="row">{{ $users->firstItem() + $loop->index }}</th>{{--$loop->iteration--}}
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->date_of_birth_formatted }}</td>
      <td>@if($user->trashed()) Trashed @else Active @endif</td>
      <td>
          @if($user->trashed())<a href="{{ route('activate.user', encrypt($user->user_id)) }}" class="btn btn-success">Activate</a>@endif
          <a href="{{ route('view.user', encrypt($user->user_id)) }}" class="btn btn-warning">View</a>
          <a href="{{ route('edit.user', encrypt($user->user_id)) }}" class="btn btn-primary">Edit</a>
          <a href="{{ route('delete.user', encrypt($user->user_id)) }}" class="btn btn-danger">Delete</a>
          <a href="{{ route('force.delete.user', encrypt($user->user_id)) }}" class="btn btn-info">force Delete</a>
      </td>
    </tr>
    @endforeach
   </tbody>
</table>
<div>
  {{ $users->links() }}
</div>
 
@endsection    
