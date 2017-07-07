<template lang="html">
	<div class="chat-log">
		<chat-message v-for="message in messages"
		v-bind:key="message" :message="message"></chat-message>
	</div>
</template>

<script>
export default {
	data() {
		return {
			messages : [
				{
					message: "Hey!",
					user : "John Doe 1"
				},
				{
					message: "Hi!",
					user : "John Doe 2"
				}
			]
		}
	}
}
</script>

<style lang="css">
	
</style>