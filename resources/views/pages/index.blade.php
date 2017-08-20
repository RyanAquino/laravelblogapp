@extends('layouts.app')

@section('title', ' | Log In or Sign Up')

@section('index')
<div class="jumbotron text-center">
	
<h1>Welcome to BlogApp!</h1>	
<p>Connect with friends and the world around you on BlogApp.</p>
<p><a href="/login" role='button' class="btn btn-primary btn-lg">Login</a></p>
<p><a href="/register" role='button' class="btn btn-success btn-lg">Register</a></p>
</div>

@endsection