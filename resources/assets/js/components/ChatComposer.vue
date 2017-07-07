<template lang="html">
	<div class="chat-composer">
		<input type="text" placeholder="Start typing your message here...">
		<button class="btn btn-primary">Send</button>
	</div>
</template>

<script>
export default {
	
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