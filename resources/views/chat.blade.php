@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
	    <div id="chat-app" class="col-md-8 col-md-offset-2">
	    	<div class="panel panel-default">
	    		<div class="panel-heading">
	    			Chat Room
	    			<span class="badge pull-right">@{{ usersInRoom.length }}</span>
	    		</div> 
	    		<div class="panel-body">
					<chat-log :messages="messages"></chat-log>	
		        	
		        </div>
		        <div class="panel-footer">
		        	<chat-composer v-on:message-sent="addMessage"></chat-composer>
		        </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
