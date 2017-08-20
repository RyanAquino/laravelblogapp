@extends('layouts.app')
@section('title', ' | Chat Room')

@section('css')
<link rel="stylesheet" href="/css/custom.css">
@endsection

@section('chat')
	<div id="app">
	<h1><i class="fa fa-users" aria-hidden="true"></i> Chat Room</h1>
     <hr>

  <div class="row">
	  <div class="col-lg-4">
	  <h4>
	  Online: 
	  <span class="label label-success">@{{ usersInRoom.length }}</span>
	  </h4>
	 <!-- @click='privateMessage(users.id)' -->
		<div class="list-group" v-for='users in usersInRoom'>
		<a class="list-group-item" v-cloak>
		@{{ users.name + ' ' + users.lname}} <i class="fa fa-globe pull-right" id="onlineColor" aria-hidden="true"></i></a>
		</div>
	  </div>

	  <div class="col-lg-8">
	    <div class = "jumbotron">
		  <chat-log :messages='messages'></chat-log>
		</div>	
	  <chat-composer current-user="{{ Auth::user()->name . ' ' . Auth::user()->lname }}" v-on:messagesent='addMessage'></chat-composer>
	  </div>

  </div>
	</div>
@endsection
