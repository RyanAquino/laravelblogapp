@extends('layouts.app')
@section('title', ' | Post')

@section('showPost')
	<h1>{{$post->title}}</h1>
	<p>Posted in: {{$post->category->name}}</p>
		<hr>
	<img src="{{Cloudder::show($post->cover_image)}}" alt="">
	<div class="jumbotron">
	<p>{!!$post->body!!}</p>
	</div>

	<small>Written on {{$post->created_at}}  by {{$post->user->name . ' ' . $post->user->lname}}</small>
	<hr>
	@if(Auth::user()->id == $post->user_id)
	<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

	
	{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST','class' => 'pull-right'])!!}

	{{Form::hidden('_method' , 'DELETE')}}
	{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

	{!!Form::close()!!}
	@endif
@endsection