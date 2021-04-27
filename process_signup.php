<?php
	function sanitise_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$errmsg = "";
	$successmsg = "";
	$result = TRUE;

	//validate username
	$uname = $_POST["uname"];
	if (isset($_POST["uname"])){
		$uname = sanitise_input($uname);
		if (strlen($uname) < 5){
			$errmsg .= "Username cannot be less than 5 alpha characters. <br>"; 	
		}
		if (strlen($uname) > 20){
			$errmsg .= "Username cannot be more than 20 alpha characters. <br>"; 	
		}
	}

	//validate password
	$psw = $_POST["psw"];
	if (isset($_POST["psw"])){
		if (strlen($psw) < 5){
			$errmsg .= "Password cannot be less than 5 alpha characters. <br>"; 	
		}
		if (strlen($psw) > 20){
			$errmsg .= "Password cannot be more than 20 alphanumeric characters. <br>"; 	
		}
	}

	$fullname = $_POST["fullname"];
	if (!isset($_POST["fullname"])){
		$errmsg .= "Please enter your full name";
	}

	// Make Decision
	if ($errmsg != ""){
		$result = FALSE;
		header("location:signup.php?msg=Error: "."$errmsg");
	}
	else{
		// Connect to mySQL
		require_once("settings.php");
		$query = "CREATE TABLE IF NOT EXISTS managers (managerid int(4) auto_increment PRIMARY KEY, full_name VARCHAR(50), username VARCHAR(20), password VARCHAR(20));";

		// Check connection
		if ($connObj->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		// echo "Connected successfully";
		$result = mysqli_query($connObj,$query);
		if (!$result){
			die("Query statement Error (".$connObj->errno.")");
		}

		// Insert manager record to manager table
		$query = "INSERT INTO `managers` (`full_name`,`username`, `password`) VALUES ('$fullname','$uname','$psw');";

		$result = @mysqli_query($connObj,$query);
		
		if ($result){
			$successmsg = "Your account has been created successfully. Please remember the login details you have provided and use them to login to manage the EOI table.";
		}
		$connObj -> close();
		header("location:signup.php?msg=$successmsg");
	}
?>