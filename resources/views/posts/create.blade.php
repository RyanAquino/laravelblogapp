@extends('layouts.app')
@section('title', ' | Create Post')

@section('create')
<h1>Create Post</h1>

{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
   <div class="form-group">
   		{{Form::label('title' ,'Title')}}
   		{{Form::text('title' ,'',['class' => 'form-control', 'placeholder' => 'Title'])}}
   </div>

   <div class="form-group"> 
      <select class="form-control" name="category">  
      <option value="{{old('category')}}" class="selected">Select Category</option>
      @foreach($categories as $category)
     <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select> 
   </div>

   <div class="form-group">
   		{{Form::label('body' ,'Body')}}
   		{{Form::textarea('body' ,'',['id' => 'article-ckeditor' ,'class' => 'form-control', 'placeholder' => 'Body text'])}}
   </div>   
   <div class="form-group">
   		{{Form::file('cover_image')}}
   </div>
   {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection

@section ('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection