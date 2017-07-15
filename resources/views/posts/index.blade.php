@extends('layouts.app')

@section('title', ' | Posts')

@section('posts')
	<h1>Posts</h1>
	<a href="/posts/create">Create a Post</a>
		@if(count($posts) > 0)

		@foreach($posts as $post)
			<div class="well">
				<h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
				<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
			</div>
		@endforeach	
			{{$posts->links()}}
		@else
			<p>No Posts Found</p>
		@endif
@endsection