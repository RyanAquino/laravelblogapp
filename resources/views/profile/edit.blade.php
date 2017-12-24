@extends('layouts.app')

@section('title', ' | Edit Profile')

@section('content')
<img src="{{ Cloudder::show('avatars/' . Auth::user()->avatar)}}" alt="Profile Picture">
<a href="">Remove Profile Picture</a>
<div class="col-lg-6 col-lg-offset-3">

<div class="row">
{!! Form::open(['action' => ['ProfileController@update'], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
   <div class="form-group">
         {{Form::label('avatar' ,'Upload Profile Image')}}
         {{Form::file('avatar')}}
   </div>
   <div class="form-group">
   		{{Form::label('fname' ,'First Name')}}
   		{{Form::text('fname' ,Auth::user()->name,['class' => 'form-control', 'required' => ''])}}
   </div>
   <div class="form-group">
   		{{Form::label('lname' ,'Last Name')}}
   		{{Form::text('lname' ,Auth::user()->lname,['class' => 'form-control','required' => ''])}}
   </div>
   <div class="form-group">
   		{{Form::label('email' ,'Email Address')}}
   		{{Form::email('email' ,Auth::user()->email,['class' => 'form-control','required' => ''])}}
   </div>

   {{Form::submit('Save',['class' => 'btn btn-primary text-center'])}}
   {!! Form::close() !!}
</div>

</div>

@endsection