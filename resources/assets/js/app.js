/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
        usersInRoom: []
    },
    methods: {
        addMessage(message) {
            // Push message to the queue
            this.messages.push(message);

            // Persist to the database etc
            axios.post('/chat/messages', message).then(response => {
                // console.log('saved successfully')
                // console.log(message)
            })
        }
    },
    created() {
        axios.get('/chat/messages').then(response => {
            this.messages = response.data;
        });

        Echo.join('chatroom')
            .here((users) => {
                this.usersInRoom = users;
            })
            .joining((user) => {
                this.usersInRoom.push(user);
            })
            .leaving((user) => {
                this.usersInRoom = this.usersInRoom.filter(usersInRoom => usersInRoom != user)
            })
            .listen('messagePosted', (event) => {
                this.messages.push({
                    message: event.message.message,
                    user: event.user
                });
            });
    }
});