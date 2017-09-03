@extends('layouts.app')
@section('title', ' | Edit Comment')

@section('editComment')
<h1>Edit Comment:</h1>

	{!! Form::open(['action' => ['CommentsController@update', $comment->id], 'method' => 'PUT']) !!}
			{{Form::textarea('comment',$comment->comment, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Write a comment...','rows' => '5', 'required' => ''])}}

   {{Form::hidden('_method', 'PUT')}}
   <hr>
   {{Form::submit('Update Comment',['class' => 'btn btn-primary'])}}

   {!! Form::close() !!}

@endsection

@section ('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection