<template lang="html">
	<div class="chat-composer">
		<input id="message" name="message" type="text" placeholder="Start typing your message here..." v-model="messageText"
			@keydown.enter="sendMessage">
		<button class="btn btn-primary" @click="sendMessage">Send</button>
	</div>
</template>

<script>
export default {
	data() {
		return {
			messageText : ''
		}
	},
	methods : {
		sendMessage(){
			console.log("message sent! : " + this.messageText);
			this.$emit("message-sent", {
				message : this.messageText,
				user : {
					name : $('.navbar-right .dropdown-toggle').text()
				}
				});
			this.messageText = '';
		}
	}
}
</script>

<style lang="css">
	.chat-composer {
		display: flex;
	}
	.chat-composer input {
		flex: 1 auto;
	}
	.chat-composer button {
		border-radius: 0;
	}
</style>