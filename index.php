<?php
//Create session id and upload it to db
//Create and set cookie 
$connection = mysqli_connect("127.0.0.1","mlh","dankmaymay","MLH");
$uniqueid = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
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
	  $mysql = "INSERT INTO users  "
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
		<input type="button" onclick="sendchat(textinput.value)" name="Send">
		<br/>
		</div>
		<div id="emojiinput">
		<!--imagestuff-->
		</div>
		<div id="closedinput">
		<!--added by js script-->
		</div>
		</form>
	</body>
</html>

