//Adds to the php database
function sendchat(str)
{
  if(str.length == 0)
 {
	alert("strlen = zero")
	document.getElementById("txt").innerHTML = "";
	return;
 }
 else
 {
  	var xmlhttp = new XMLHttpRequest();

	//xmlhttp.onreadyStatechange = function()
	xmlhttp.onreadystatechange = function()
	{
	   	
		alert("HTML READYSTATE:" + xmlhttp.readyState+" STATUS: "+xmlhttp.status);
	 	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
		  document.getElementById("chat").innerHTML = xmlhttp.responseText;
		}
		
	};

	xmlhttp.open("GET","http://127.0.0.1/MLGmarch2016/updatechat.php?chat="+str,true);
	xmlhttp.send();
 }


}
