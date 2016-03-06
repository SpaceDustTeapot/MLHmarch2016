<?php
	session_start();
	header('Access-Control-Allow-Origin: *'); 
	//header("Content-type: text/xml");
	
	//$_SESSION['keywords'];
	//$_SESSION['currentQ']; - The question to process the answer for
	
	$nextQ = 1;
	//if(isset($_GET['answer'])){
	//	$nextQ = $_GET['answer'];
	//}
	
	//if(!isset($_SESSION['currentQ'])){
	//	$_SESSION['currentQ'] = 1;
	//}
	
	if(!isset($_SESSION['searchKeys'])){
		$_SESSION['searchKeys'] = "";
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
		$sql = "SELECT * FROM questionbank WHERE primaryKey = " . $_SESSION['currentQ'];
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if(isset($_GET['answer'])){
					for($i = 1; $i <= 4; $i++){
						$keyword = $row['keyword' . $i];
						if($keyword != ""){
							if(stripos($_GET['answer'], $keyword) !== false){
								$_SESSION['searchKeys'] .= $keyword . " ";
								$nextQ = $row['nextQFrom' . $i];
								break 2;
							}
						} else if($i == 1){
								$_SESSION['searchKeys'] .= $_GET['answer'] . " ";
								$nextQ = $row['nextQFrom' . $i];
								break 2;
						}
					}
				}
				if(isset($_SESSION['lastXmlResponse'])){
					echo $_SESSION['lastXmlResponse'];
					$repeatQuestion = true;
				}
			}
		} else {
			$_SESSION['currentQ'];
		}
	}
	
	//Don't do this if the user gave a bad answer last time
	if($repeatQuestion == false){
		/////////////////	Start getting question process	/////////////////////
		
		$sql = "SELECT * FROM questionbank WHERE primaryKey = " . $nextQ;
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
			$xmlResponse = "Invalid question ID";
		}
		echo $xmlResponse . " - " . $_SESSION['currentQ'] . " - " . $nextQ;
		$_SESSION['lastXmlResponse'] = $xmlResponse;
		$_SESSION['currentQ'] = $nextQ;
	}
	
	echo "<br>Search keys: " . $_SESSION['searchKeys'];
	$conn->close();
	
?>
