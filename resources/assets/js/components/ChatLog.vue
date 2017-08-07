<template>
    <div class = "chat-log">
        <chat-message v-for="message in messages" :key="message" :message="message"></chat-message>
        <div class = 'empty' v-show='messages.length === 0'>Nothing Here yet!</div>
    </div>
</template>

<script>
    export default {    
    props: ['messages']
    }
</script>
