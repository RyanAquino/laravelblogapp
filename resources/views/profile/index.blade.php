@extends('layouts.app')

@section('title', ' | Profile')

@section('css')
<link rel="stylesheet" href="/css/custom.css">
@endsection

@section('content')
<h1>{{Auth::user()->name . ' ' . Auth::user()->lname}}'s Profile</h1>

<img src="{{ Cloudder::show('avatars/' . Auth::user()->avatar)}}" alt="Profile Picture" id="profileImage">

<img src="" alt="">
<label for="">First Name</label>: {{Auth::user()->name}} <br>
<label for="">Last Name</label>: {{Auth::user()->lname}} <br>
<label for="">Email Address</label>: {{Auth::user()->email}} <br>

<a href="/profile/edit" class="btn btn-primary">Edit Info</a>
<a href="/profile/change_password" class="btn btn-primary">Change Password</a>
@endsection