@extends('layouts.app')
@section('title', ' | Edit Post')

@section('edit')
<h1>Edit Post</h1>

{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
   <div class="form-group">
   		{{Form::label('title' ,'Title')}}
   		{{Form::text('title' ,$post->title,['class' => 'form-control', 'placeholder' => 'Title', 'required' => ''])}}
   </div>

    <div class="form-group">
    {{Form::select('category',$categories, $post->category_id ,['class' => 'form-control','required' => ''])}}
    </div>

   <div class="form-group">
   		{{Form::label('body' ,'Body')}}
   		{{Form::textarea('body' ,$post->body,['id' => 'article-ckeditor' ,'class' => 'form-control', 'placeholder' => 'Body text', 'required' => ''])}}
   </div>   
   
   <div class="form-group">
         {{Form::file('cover_image')}}
   </div>

   {{Form::hidden('_method', 'PUT')}}
   {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
   {!! Form::close() !!}
   
@endsection

@section ('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection