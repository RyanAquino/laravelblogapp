@extends('layouts.app')
@section('title', ' | Chat Room')

@section('chat')
	<div id="app">
	<h1>This is  the Chat Room</h1>
	<div class="panel-heading">
		<span class="badge pull-right">Online Users: @{{ usersInRoom.length }}</span>
	</div>
	
	<chat-log :messages='messages'></chat-log>
	<chat-composer current-user="{{ Auth::user()->name . ' ' . Auth::user()->lname }}" v-on:messagesent='addMessage'></chat-composer>
	</div>
@endsection