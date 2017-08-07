<template>
    <div class="chat-message">
        <p>{{ message.message }}</p>
        <small>{{ message.user.name }}</small>
        <hr>
    </div>
</template>

<script>
    export default {
    	props:['message']
    }
</script>
