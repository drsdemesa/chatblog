
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

// Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));

Vue.component('chat-log', require('./components/ChatLog.vue'));

Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#chat-app',
    data : {
		messages : [],
        usersInRoom : []
    },
    methods: {
    	addMessage(message) {
    		//add to existing messages
    		this.messages.push(message);
    		//persist to the database
            axios.post('/messages', message);
    		console.log("added message!");
    	}
    },
    created(){
        axios.get('/messages').then( response => {
            this.messages = response.data;
        });

        Echo.join('chat-room')
            .here((users) => {
                this.usersInRoom = users;
                console.log(users + " are here");
            })
            .joining((user) => {
                this.usersInRoom.push(user);
                console.log("one user joined : " + user);
            })
            .leaving((user) => {
                this.usersInRoom = this.usersInRoom.filter(u => u != user);
                console.log("one user left : " + user);
            })
            .listen('MessagePosted', (e) => {
                this.messages.push({
                    message : e.message.message,
                    user : e.user
                });
                console.log(e);
                //handle event
            });
    }
});
