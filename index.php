<?php
//Create session id and upload it to db
//Create and set cookie 
$connection = mysqli_connect("127.0.0.1","mlh","dankmaymay","MLH");
$uniqueid = bin2hex(substr(md5(rand()), 0, 7));
initsession($uniqueid,$connection);
function initsession($hash,$con)
{
//create cookie
 
	if(isset($_COOKIE['sesh']))
	{

	}
	else
	{
	  setcookie("sesh",$hash,time() +2592000);
	  $mysql = "INSERT INTO users  ";
	}

}

?>

<html>
	<head>
	<link rel="stylesheet" href="css/index.css">
	<script type="text/javascript" src="js/chat.js"></script>
       <script type="text/javascript" src="js/response_ajax.js"></script>
	</head>
	
	<body> 
		<form>
		<div id="comment">
		<textarea name="chatbox" id="chat"  type="Comment" rows="30" cols="120"></textarea>
		</div>
		<div id="text">
		<textarea type="text" id="txt" name="textinput" rows="3" cols="39"></textarea> 
		<input type="button" onclick="sendchat(textinput.value); alert('BANTER')" name="Send">
		<br/>
		</div>
		<div id="emojiinput">
		<img src="Emojis/1.png"></img>
		<input type="image" src="Emojis/2.png">
		<input type="image" src="Emojis/3.png">
		<input type="image" src="Emojis/4.png">
		<input type="image" src="Emojis/5.png">
		<input type="image" src="Emojis/6.png">
		</div>
		<div id="closedinput">
		
		</div>
		</form>
	</body>
</html>

