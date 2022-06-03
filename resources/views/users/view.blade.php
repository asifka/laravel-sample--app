@extends('layouts.master')
@section('title','New User')
@section('content')
<div class="container">
     <ul>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Status: {{ $user->status_text }}</li>
     </ul>
     <ul>
        <li>Address line 1: {{ $user->address->address_line_1 }}</li>
        <li>City: {{ $user->address->city }}</li>
     </ul> 
     {{-- <ul>
        <li>Address line 1: {{ $address->address_line_1 }}</li>
        <li>City: {{ $address->city }}</li>
        <li>Name: {{ $address->user->name }}</li>
     </ul> --}}
    
</div>   
@endsection