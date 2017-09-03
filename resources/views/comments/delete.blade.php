@extends('layouts.app')
@section('title', ' | Delete Comment')

@section('editComment')
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
  <h1>DELETE THIS COMMENT?</h1>
  <hr>
  <strong>Name:</strong> {{$comment->name}} 
  <br>
  <strong>Comment:</strong>{!!$comment->comment!!}
  {{Form::open(['action' => ['CommentsController@destroy', $comment->id] , 'method' => 'DELETE'])}}
  {{Form::submit('Delete', ['class' => 'btn btn-lg btn-block btn-danger'])}}

  {{Form::close()}}
  </div>
</div>


@endsection