@extends('layouts.app')

@section('title', ' | Posts')

@section('posts')
	<h1>Posts</h1>
	<a href="/posts/create">Create a Post</a>
		@if(count($posts) > 0)

		@foreach($posts as $post)
			<div class="well">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<img src="/cover_images/{{$post->cover_image}}" class='img-thumbnail img-fluid'>
				</div>
				<div class="col-md-8 col-sm-8">
				<h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
				<small>Written on {{$post->created_at}} by {{$post->user->name . ' ' . $post->user->lname}}</small>
				</div>
			</div>
			</div>
		@endforeach	
			{{$posts->links()}}
		@else
			<p>No Posts Found</p>
		@endif
@endsection