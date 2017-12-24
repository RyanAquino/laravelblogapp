<template>

      <div class="input-group chat-composer">
        <input type='text' class="form-control" placeholder ='Type your message here...' v-model="messageText" @keyup.enter='sendMessage()'>
         <span class="input-group-btn">
        <button class='btn btn-primary' @click='sendMessage'><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
         </span>
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
