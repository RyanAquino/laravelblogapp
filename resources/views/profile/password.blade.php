@extends('layouts.app')

@section('title', ' | Edit Password')

@section('content')
<div class="col-lg-6 col-lg-offset-3">

<div class="row">
{!! Form::open(['action' => ['ProfileController@changePassword'], 'method' => 'PATCH']) !!}
   <div class="form-group">
   		<label for="oldPassword">Old Password</label>
         <input type="password" name="oldPassword" class="form-control" required>
   </div>
   <div class="form-group">
         <label for="password">New Password</label>
         <input type="password" name="password" class="form-control" required>
   </div>
   <div class="form-group">
         <label for="password_confirmation">Confirm Password</label>
         <input type="password" name="password_confirmation" class="form-control" required>
   </div>

   {{Form::submit('Save',['class' => 'btn btn-primary text-center'])}}
   {!! Form::close() !!}
</div>

</div>

@endsection