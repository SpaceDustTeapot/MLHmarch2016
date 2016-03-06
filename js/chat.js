var hidden=0;

function first_load(){
	hidden = 1;
	document.getElementById("emojiinput").style.display = 'none';
	document.getElementById("closedinput").style.display = "none";
}

function hid_input(input){
	if(input == 1){
		document.getElementById("text").style.display = "block";
		document.getElementById("emojiinput").style.display = "none";
		document.getElementById("closedinput").style.display = "none";
		hidden = 1;
	} else if(input == 2){
		hidden =2;
		document.getElementById("text").style.display = "none";
		document.getElementById("emojiinput").style.display = "block";
		document.getElementById("closedinput").style.display = "none";
	} else if(input == 3){
		hidden = 3;
		document.getElementById("text").style.display = "none";
		document.getElementById("emojiinput").style.display = "none";
		document.getElementById("closedinput").style.display = "block";
	}
}
