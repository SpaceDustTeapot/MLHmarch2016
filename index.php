<?php
//Create session id and upload it to db
//Create and set cookie
$connection = mysqli_connect("127.0.0.1","mlh","dankmaymay","MLH");
$uniqueid = bin2hex(substr(md5(rand()), 0, 7));
initsession($uniqueid,$connection);

function initsession($hash,$con){
	//create cookie
	if(!isset($_COOKIE['sesh'])){
		setcookie("sesh",$hash,time() +2592000);
	}
}
?>

<html>
	<head>
		<!--<link rel="stylesheet" href="css/index.css">-->
		<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/newLook.css" />
		<script type="text/javascript" src="js/chat.js"></script>
		<script type="text/javascript" src="js/response_ajax.js"></script>
	</head>

	<body onload="first_load()">
		<div id="wrapper">
			<header>
				<h1>ImHungryPleaseFeed.me</h1>
			</header>

			<main>
				<form>
					<div id="comment">
						<textarea name="chatbox" readonly id="chat"  type="Comment" rows="30" cols="120"></textarea>
					</div>
					<div id="text">
						<textarea type="text" id="txt" name="textinput" onkeypress="checkSubmit(event);"></textarea>
						<input type="button" onclick="sendChat(document.getElementById('txt').value);" name="Send" value="submit" />
						<br />
					</div>
					<div id="emojiinput">
						<input type="image" src="Emojis/1.png" />
						<input type="image" src="Emojis/2.png" />
						<input type="image" src="Emojis/3.png" />
						<input type="image" src="Emojis/4.png" />
						<input type="image" src="Emojis/5.png" />
						<input type="image" src="Emojis/6.png" />
					</div>
					<div id="closedinput">

					</div>
				</form>
			</main>
		</div>

	</body>
</html>
