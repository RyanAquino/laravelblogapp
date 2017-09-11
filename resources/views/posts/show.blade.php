@extends('layouts.app')
@section('title', ' | Post')

@section('showPost')
	<h1>{{$post->title}}</h1>
	<p>Posted in: {{$post->category->name}}</p>
	<small>Posted by {{$post->user->name . ' ' . $post->user->lname}} on {{$post->created_at->toFormattedDateString()}}  </small>
		<hr>
	@if($post->cover_image != 'no_image.jpg')
	<img src="{{Cloudder::show($post->cover_image)}}" alt="No Image to display">
	@endif

	<div class="jumbotron">
	<p>{!!$post->body!!}</p>
	</div>
	
	@if(Auth::user()->id == $post->user_id)
		<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
		<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#deletePost">Delete</button>
 		@include('modals.deletePost')
	@endif


	
	<div class="row">
	<div class="col-lg-6">
		<h4>Comments:</h4>

		@if(count($post->comments) > 0)

		<ul class="list-group">
		@foreach($post->comments as $comment)
			<li class="list-group-item">
				{!!$comment->comment!!} <br>
				<b>{{$comment->name}}</b> 
				<small>{{$comment->updated_at->diffForHumans()}}</small>
				
				@if(Auth::user()->id == $comment->user_id)
				<hr>
				<a href="/comments/{{$comment->id}}/edit">edit</a>
					<a href='' data-toggle="modal" data-target="#deleteComment">delete</a>
					@include('modals.deleteComment')
				@endif
			</li>
		@endforeach
		</ul>
		
		@else
			<p>No comments to show</p>
		@endif
		
	</div>
	</div>

	<div class="row">
		<div class="col-lg-8">
			{{ Form::open(['action' => ['CommentsController@store',$post->id], 'method' => 'POST']) }}
			{{Form::label('comment','Add a comment:')}}
			{{Form::textarea('comment',null, ['id' => 'tinyMce','class' => 'form-control', 'placeholder' => 'Write a comment...'])}}
			{{Form::submit('submit',['class' =>' btn btn-primary'])}}
			{{ Form::close() }}	
		</div>
	</div>


@endsection

@section ('scripts')
  <script src="/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ 
    selector:'#tinyMce',
      plugins: "image",
      menubar: false
  });
  </script>
@endsection