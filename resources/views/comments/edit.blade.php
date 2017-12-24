@extends('layouts.app')
@section('title', ' | Edit Comment')

@section('editComment')
<a href='{{url()->previous()}}'class="btn btn-default" type="button"> << Back to post </a> 
<h1>Edit Comment:</h1>
<div class="row">
	{!! Form::open(['action' => ['CommentsController@update', $comment->id], 'method' => 'PUT']) !!}
			{{Form::textarea('comment',$comment->comment, ['id' => 'tinyMce','class' => 'form-control', 'placeholder' => 'Write a comment...','rows' => '5', 'required' => ''])}}
   <hr>
    {{Form::hidden('_method', 'PUT')}}
      {{Form::submit('Update Comment',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

      



@endsection

@section ('scripts')
  <script src="/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ 
    selector:'#tinyMce',
    plugins: "image",
  });
  </script>
@endsection