<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Chat Room </title>
		<link rel="stylesheet" type="text/css" href="css/app.css">
	</head>
	<body>
	<div id="app">
		<h1>Chat Room</h1>
		<!-- <example></example> -->
		<!-- <chat-message></chat-message> -->
		<chat-log></chat-log>
		<chat-composer v-on:message-sent="addMessage"></chat-composer>
	</div>
	
		<script src="js/app.js" charset="utf-8"></script>
	</body>
</html>