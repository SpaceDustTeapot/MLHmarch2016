//Adds to the php database
/*
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
	   	
		
	 	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
		  document.getElementById("chat").innerHTML = xmlhttp.responseText;
		}

		
	};

	xmlhttp.open("GET","updatechat.php?chat="+str,true);
	xmlhttp.send();
 }


}
*/

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


                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                  //document.getElementById("chat").innerHTML = xmlhttp.responseText;
             	  xmlDoc = xhttp.responsiveXML;
		 text = "";
	         ayy = xmlDoc.getElementsByTagName("questionType");
		 l = xmlDoc.getElementsByTagName("value");
		 mao = xmlDoc.getElementsByTagName("answer");
		 bant = xmlDoc.getElementsByTagName("question");
		}

		for(i= 0; i<bant.length;i++)
		{
		 //question
		 document.getElementById("chat").innerHTML = bant[i].childNode[0].nodeValue;
		}

		for(k=0; k<ayy.length;k++)
		{
		  temp = ayy[i].childNode[0].nodeValue;
		  hid_input(temp);
		}

		for(meme =0; meme<mao.length;meme++)
		{ 
		  kek = l[i].childNode[0].nodeValue;
		  lel = mao[i].childNode[0].nodeValue;
		  document.getElementById("closedinput").innerHTML += "<input type='button' onclick='samechat(this.value)' value=' + kek +' name='+ mao  +'  >"  ;
		}

		


        };

	if(hidden = 1)
  	{
        xmlhttp.open("GET","updatechat.php?answer="+str,true);
        }
	else if(hidden = 2)
	{
	xmlhttp.open("GET","updatechat.php?answer="+str,true);
	}
	else if(hidden = 3)
	{
	xmlhttp.open("GET","updatechat.php?anwer="+str,true);
	}
	 xmlhttp.send();
 }


}

