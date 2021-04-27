<?php
	session_start();
	$_SESSION['logon'] = 0;
	$errmsg = "";
	$successmsg = "";
	$result = TRUE;

	// Connect to mySQL
	require_once("settings.php");
	
	$uname = $_POST["uname"];
	if (!isset($_POST["uname"])){
		$errmsg .= "Please enter your username";
	}
	
	$psw = $_POST["psw"];
	if (!isset($_POST["uname"])){
		$errmsg .= "Please enter your password";
	}

		// Make Decision
	if ($errmsg != ""){
		$result = FALSE;
		header("location:login.php?msg=Error: "."$errmsg");
	}else{
		// Connect to mySQL
		require_once("settings.php");
		
		$query = "SELECT * FROM managers WHERE username = '$uname' AND password = '$psw'";
		// Check connection
		if ($connObj->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		// echo "Connected successfully";
		$result = mysqli_query($connObj,$query);
		if ($result){
			$record = mysqli_fetch_assoc($result);
			if ($record) { //check if any record exists
	        	$_SESSION['logon'] = 1;
	        	$_SESSION['name'] = $record['full_name'];
	        	header("location:manage.php");
			}else{
				header("location:login.php?msg=Error: Invalid credentials");
			}
		}else{
			die("Unable to login, please try again later. Query statement Error (".$connObj->errno.")");
		}
	}
?>