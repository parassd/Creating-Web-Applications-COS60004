<?php
	// Application Form validation
	$errmsg = "";
	$result = TRUE; //assume form is valid
	if (isset($_POST["ref_id"])){
		// validate job reference ID
		if (strlen($_POST["ref_id"])!=5){
			$errmsg .= "Job reference number should be exactly 5 alphanumeric characters. <br>"; 
		}
	}

	// validate first name
	if (isset($_POST["first_name"])){
		if ($_POST["first_name"] == ""){
			$errmsg .= "First name is required. <br>";
		}
		if (strlen($_POST["first_name"] > 20)){
		$errmsg .= "First name cannot be more than 20 alpha characters. <br>"; 	
		}
	}

	// validate last name
	if (isset($_POST["last_name"])){
		if ($_POST["last_name"] == ""){
			$errmsg .= "Last name is required. <br>";
		}
		if (strlen($_POST["last_name"] > 20)){
		$errmsg .= "Last name cannot be more than 20 alpha characters. <br>"; 	
		}
	}

	// validate Date of birth
	if (isset($_POST["dob"])){
		if ($_POST["dob"] == ""){
			$errmsg .= "Date of birth is required. <br>";
		}
		// check regex as well
		else if ((preg_match("/(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/"),$_POST[dob])!=1){
			$errmsg .= "Date of birth must be of format dd/mm/yyyy. <br>";	
		}
		else{
			// Calculate the age
			$dob = new DateTime($dob); 
			$today = new DateTime(date('d.m.y'));
			$age = $today -> diff ($dob);
			if ($age -> y < 15 || $age -> y > 80){
				$errmsg.= "Age should be between 15 and 80 <br>";
			}
		}
	}

	// validate gender
	if (!isset($_POST["gender"])){
		$errmsg .="Gender should be selected. <br>";
	}

	// validate street address
	if (isset($_POST["street_address"])){
		if ($_POST["street_address"] == ""){
			$errmsg .= "Street address is required. <br>";
		}
		if (strlen($_POST["street_address"]) > 40){
		$errmsg .= "Street Address cannot be more than 40 alphanumeric characters. <br>"; 	
		}
	}

	// validate suburb/town
	if (isset($_POST["suburb"])){
		if ($_POST["suburb"] == ""){
			$errmsg .= "Suburb is required. <br>";
		}
		if (strlen($_POST["suburb"]) > 40){
		$errmsg .= "Suburb cannot be more than 40 alphanumeric characters. <br>"; 	
		}
	}

	// Make Decision
	if ($errmsg != ""){
		$result = FALSE;
		header("location:apply.php?msg=$errmsg");
	}
	else{
		echo "All good, data is sent to database. <br>";
	}
?>