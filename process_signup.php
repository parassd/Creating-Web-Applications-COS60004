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
		elseif (strlen($psw) > 20){
			$errmsg .= "Password cannot be more than 20 alphanumeric characters. <br>"; 	
		}
		elseif (isset($_POST["pswconfirm"])){
			if ($psw!=$_POST["pswconfirm"]){
				$errmsg.= "Passwords do not match, please try again. <br>";
			}
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

		$query = "SELECT * FROM managers WHERE username = '$uname';";
		// header("location:signup.php?msg=$query");
		// Check connection
		if ($connObj->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		// echo "Connected successfully";
		$result = mysqli_query($connObj,$query);
		if ($result){
			$record = mysqli_fetch_assoc($result);
			// header("location:signup.php?msg=$record");
			if ($record) { //check if any record exists
				header("location:signup.php?msg=Error: This username is already taken, please try another username.");
			}
			else{
			// Insert manager record to manager table
			$query = "INSERT INTO `managers` (`full_name`,`username`, `password`) VALUES ('$fullname','$uname','$psw');";

			$result = @mysqli_query($connObj,$query);
			
			if ($result){
				$successmsg = "Your account has been created successfully. Please remember the login details you have provided and use them to login to manage the EOI table.";
			}
			$connObj -> close();
			header("location:signup.php?msg=$successmsg");	
			}
		}else{
			die("Unable to process your request, please try again later. Query statement Error (".$connObj->errno.")");
		}
		
	}
?>