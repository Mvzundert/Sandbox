<template lang="html">
    <div class="chat-log">
        <chat-message  v-for="message in messages" :message="message" :key="message.id"></chat-message>
    </div>
</template>

<script>
export default {
    data(){
        return {
            messages: [
                {
                    message: "Message 1",
                    user: "M. van Zundert"
                },
                {
                    message: "Message 2",
                    user: "Test User"
                }
            ]
        }
    }
}
</script>

<style lang="css">
    .chat-log .chat-message:nth-child(even){
        background-color: #faf2cc;
    }
</style>
