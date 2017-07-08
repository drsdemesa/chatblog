<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Chat Room </title>
		<link rel="stylesheet" type="text/css" href="css/app.css">
	</head>
	<body>
	<div id="chat-app">
		<h1>Chat Room</h1>
		<chat-log :messages="messages"></chat-log>
		<chat-composer v-on:message-sent="addMessage"></chat-composer>
	</div>
	
		<script src="js/app.js" charset="utf-8"></script>
	</body>
</html>