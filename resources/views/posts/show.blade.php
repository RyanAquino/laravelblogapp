@extends('layouts.app')
@section('title', ' | Post')

@section('showPost')
	<h1>{{$post->title}}</h1>
		<hr>
	<div class="jumbotron">
	<p>{!!$post->body!!}</p>
	</div>
	<hr>
	<small>Written on {{$post->created_at}}  by {{$post->user->name}}</small>
	<hr>
	@if(Auth::user()->id == $post->user_id)
	<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

	
	{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST','class' => 'pull-right'])!!}

	{{Form::hidden('_method' , 'DELETE')}}
	{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

	{!!Form::close()!!}
	@endif
@endsection