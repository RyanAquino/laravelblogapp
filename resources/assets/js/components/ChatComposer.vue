<template>
    <div class="chat-composer">
        <input type='text' placeholder ='Start typing your message . . . ' v-model="messageText" @keyup.enter='sendMessage()'>
        <button class='btn btn-primary' @click='sendMessage'>Send</button>

    </div>
</template>

<script>
    export default {
    props: ['currentUser'],
    
    data(){
        return{
            messageText: ''
        }
    },

    methods: {
        sendMessage(){
            this.$emit('messagesent', {
                message:this.messageText,
                user: {
                    name:this.currentUser
                }
            }
            );
            console.log(this.messageText);
            this.messageText='';
        }

    }


    }
</script>
