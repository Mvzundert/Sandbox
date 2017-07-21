<template lang="html">
    <div class="chat-composer">

        <input type="text" placeholder="Type here" v-model="messageText" @keyup.enter="sendMessage"/>
        <button class="btn btn-primary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
export default {
  data(){
    return {
      messageText: ''
    }
  },

    sendMessage() {
        this.$emit('messagesent',{
            message: this.messageText,
            user: {
                // @TODO should probably not grab it from the DOM. =)
                // @TODO doing this on page load might be better?
                name: $('.navbar-right .dropdown-toggle ').text()
            }
        });
        this.messageText = '';
    }
  }
}
</script>

<style lang="css">
    .chat-composer{
        display: flex;
    }
    .chat-composer input{
        flex: 1 auto;
    }
    .chat-composer button{
        border-radius: 0;
    }
</style>
