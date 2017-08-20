@extends('layouts.app')

@section('title', ' | Posts')

@section('css')
<link rel="stylesheet" href="/css/custom.css">
@endsection

@section('posts')
	<h1>Posts</h1>
	<hr>
	<a href="/posts/create">Create a Post</a>
		@if(count($posts) > 0)

		@foreach($posts as $post)
			<div class="well">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<img src="/cover_images/{{$post->cover_image}}" class='img-thumbnail img-fluid' id="cover_image">
				</div>
				<div class="col-md-8 col-sm-8">
				<h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
				<p>{!! substr($post->body,0,50) !!}{{ strlen(strip_tags($post->body)) > 50 ? '...': ''}}</p>

				<small>
				Posted in: <b>{{$post->category->name}} </b><br>
				Written on {{$post->created_at}} by {{$post->user->name . ' ' . $post->user->lname}}</small>
				</div>
			</div>
			</div>
		@endforeach	
			{{$posts->links()}}
		@else
			<p>No Posts Found</p>
		@endif
@endsection
