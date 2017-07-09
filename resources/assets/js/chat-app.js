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