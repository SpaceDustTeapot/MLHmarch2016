function first_load()
{

	document.getElementById("emojiinput").style.display = 'none';
	document.getElementById("closedinput").style.display = "none";
}


function hid_input(input)
{

 if(input == 1)
 {
  document.getElementById("text").style.display = "block";
  document.getElementById("emojiinput").style.display = "none";
  document.getElementById("closedinput").style.display = "none";
 }
 else if(input == 2)
 {
  document.getElementById("text").style.display = "none";
  document.getElementById("emojiinput").style.display = "block";
  document.getElementById("closedinput").style.display = "none";
 }
 else if(input == 3)
 {
  document.getElementById("text").style.display = "none";
  document.getElementById("emojiinput").style.display = "none";
  document.getElementById("closedinput").style.display = "block";
 }

}
