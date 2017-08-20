<template>
    <div class="chat-message">
        <p class='lead'>{{ message.message }}</p>
        <small>by {{ message.user.name + ' '}}</small>
        <hr id='chatLog'>
    </div>
</template>

<script>
    export default {
    	props:['message']
    }
</script>

<style>
hr#chatLog {
	border-top: 1px solid #8c8b8b;
	text-align: center;
}

hr#chatLog:after {
	content: '§';
	display: inline-block;
	position: relative;
	top: -14px;
	padding: 0 10px;
	background: #f0f0f0;
	color: #8c8b8b;
	font-size: 18px;
	-webkit-transform: rotate(60deg);
	-moz-transform: rotate(60deg);
	transform: rotate(60deg);
}
</style>