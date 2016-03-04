//Adds to the php database
function sendchat(str)
{
  if(str.length == 0)
 {
	document.getElementById("txt").innerHTML = "";
	return;
 }
 else
 {
  	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
	 	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
		  document.getElementById("chat").innerHTML = xmlhttp.responseText; 
		}
	};

	xmlhttp.open("GET","updatechat.php?chat="+str,true);
	xmlhttp.send();
 }


}
