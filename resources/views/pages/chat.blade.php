@extends('layouts.app')
@section('title', ' | Chat Room')

@section('chat')
	<div id="app">
	<h1>Chat Room</h1>

  <div class="row">
      <div class="col-lg-6">
      <span class="label label-success pull-right">Online: @{{ usersInRoom.length }}</span>
      <hr>
    <div class = "jumbotron">
	  <chat-log :messages='messages'></chat-log>
	</div>
	  <chat-composer current-user="{{ Auth::user()->name . ' ' . Auth::user()->lname }}" v-on:messagesent='addMessage'></chat-composer>
	  </div>
  </div>
	</div>
@endsection
