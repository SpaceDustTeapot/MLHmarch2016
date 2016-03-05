<?php
	session_start();
	header('Access-Control-Allow-Origin: *'); 
	//header("Content-type: text/xml");
	
	//$_SESSION['keywords'];
	//$_SESSION['currentQ'];
	
	//CHANGE THIS
	$nextQ = 1;
	if(isset($_GET['answer'])){
		echo $_GET['answer'];
	}
	
	
	////////////////	Set up SQL stuff	///////////////////
	
	$servername = "localhost";
	$username = "mlh";
	$password = "dankmaymay";
	$dbname = "mlh";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	//echo "&#13Connected successfully";
	
	$repeatQuestion = false;
	
	////////////////	Process user answer		//////////////////////
	
	if(isset($_SESSION['currentQ'])){
		echo "Current question is " . $_SESSION['currentQ'];
		$sql = "SELECT * FROM questionbank WHERE primaryKey = '" . $_SESSION['currentQ'] . "'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if(isset($_GET['answer'])){
					echo "get answer is set";
					for($i = 1; $i <= 4; $i++){
						echo "the for loop runs";
						$keyword = $row['keyword' . $i];
						if($keyword != ""){
							echo "the keyword isn't empty";
							if(stripos($_GET['answer'], $keyword) === true){
								echo "The keyword has been found";
								$nextQ = $row['nextQFrom' . $i];
								break 2;
							}
						}
					}
				}
				if(isset($_SESSION['lastXmlResponse'])){
					echo $_SESSION['lastXmlResponse'];
					$repeatQuestion = true;
				}
			}
		} else {
			echo "&#13;0 results";
		}
	}
	
	echo "I get to checking repeatQuestion";
	
	//Don't do this if the user gave a bad answer last time
	if($repeatQuestion == false){
		/////////////////	Start getting question process	/////////////////////
		echo "repeatQuestion is false";
		$sql = "SELECT * FROM questionbank WHERE primaryKey = '" . $nextQ . "'";
		$result = $conn->query($sql);
		
		$xmlResponse = "";
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$xmlResponse .= "&#13<banter>";
					//if($row['option1'] == ""){
						$xmlResponse .= "&#13<questionType>1</questionType>";
					//} else{
						//$xmlResponse .= "&#13<questionType>3</questionType>";
					//}
					$xmlResponse .= "&#13<question>" . $row['question'] . "</question>";
					//for($i = 1; $i <= 4; $i++){
					//	$option = $row['keyword' . $i];
					//	if($option != ""){
					//		$xmlResponse .= "&#13<answer>" . $option . "</answer>";
					//		$xmlResponse .= "&#13<value>" . $row['nextQFrom' . $i] . "</value>";
					//	}
					//}
				$xmlResponse .= "&#13</banter>";
			}
		} else {
			$xmlResponse = "&#13;0 results";
		}
		
		echo $xmlResponse;
		$_SESSION['lastXmlResponse'] = $xmlResponse;
		$_SESSION['currentQ'] = $nextQ;
	}
	
	
	$conn->close();
	
?>
