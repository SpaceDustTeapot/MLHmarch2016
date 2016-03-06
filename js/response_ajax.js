function checkSubmit(e)
{
   if(e && e.keyCode == 13){
      sendChat(document.getElementById('txt').value);
   }
}

function sendChat(str){
	if(str.length != 0){
		var xmlhttp = new XMLHttpRequest();
		
        xmlhttp.onreadystatechange = function(){

			var text = "";
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				
				var textarea = document.getElementById('chat');
				textarea.value += str + '\n';
				textarea.scrollTop = textarea.scrollHeight;
				
				text = xmlhttp.responseText;
				var responseLength = text.length;
			
				//alert("TEXT: " + text);
				var foundQuestion = false;
				var foundQuestionType=false;
				var qloc = 0;
				var fqloc = 0;
				var endofq = 0;
				var endoffq = 0;
				var q = "";
				var qt = "";
				
				//find <question>
				for(var k=0;k<responseLength;k++){
					var test = text.substr(k,10); 
					// console.log(test);
					if(test == "<question>"){
						foundQuestion = true;
						qloc = k+10;
						//alert("found Question");
						//alert(test);
						//alert(text.substr(k+10,10));
					}
				}
				//find <questionType>
				for(var k=0;k<responseLength;k++){
					var test = text.substr(k,14);
					//console.log(test);
					if(test == "<questionType>"){
						foundQuestionType=true;
						fqloc = k + 14;
						//alert("foundQUESTIONTYPE");
						//alert(text.substr(k+13,13));
					}
				}
				
				var flag = false;
				for(var k =qloc; k<responseLength;k++){
					var test = text.substr(k,1);
					console.log(test);
					if(test == "<" && flag == false){
						//alert(test); 
						flag = true;
						endofq = k;  //fine
					}
				}
				
				flag = false;
				for(var k = fqloc; k<responseLength;k++){
					var test = text.substr(k,1);
					//console.log(test);
					if(test == "<" && flag == false){
						flag = true;
						endoffq = k;
					}
				}
				
				console.log(text.substr(qloc,endofq - qloc));
				console.log(text.substr(fqloc, endoffq-fqloc));
				
				var Question = text.substr(qloc,endofq - qloc);
				var Questiontype = text.substr(fqloc, endoffq-fqloc);
				//alert(Question);
				//alert(Questiontype);
				
				document.getElementById('chat').value += Question + '\n';
				document.getElementById('txt').value = '';
			}
		};
	
		if(hidden == 1){
			xmlhttp.open("GET","updatechat.php?answer=" + str, true);
		} else if(hidden == 2){
			xmlhttp.open("GET","updatechat.php?answer=" + str, true);
		} else if(hidden == 3){
			xmlhttp.open("GET","updatechat.php?anwer=" + str, true);
		}
		xmlhttp.send();
	}
}

																
