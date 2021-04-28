<!DOCTYPE html> 
<html lang="en">
	<head>
		<title>Super IT Consultant</title>
		<meta charset="utf-8" />
		<meta name="description" content="Jobs listing Page" />
		<meta name="keywords" content="HTML5, CSS Media Query" />
		<meta name="author" content="Paras Sood"  /> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "styles/style.css" rel = "stylesheet"/>
		<script src = "scripts/apply.js"></script>
	</head>
	<body id = "manage_page">
		<?php
			include_once("sidenav.inc");
			include_once("header.inc");
			include_once("nav.inc");
		?>
		<?php
			function sanitise_input($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			// Application Form validation
			$errmsg = "";
			$result = TRUE; //assume form is valid
			if (isset($_POST["ref_id"])){
				$ref_id = $_POST["ref_id"];
				// validate job reference ID
				if (strlen($ref_id)!=5){
					$errmsg .= "Job reference number should be exactly 5 alphanumeric characters. <br>"; 
				}
			}

			// validate first name
			if (isset($_POST["first_name"])){
				$fname = $_POST["first_name"];
				$fname = sanitise_input($fname);
				if ($fname == ""){
					$errmsg .= "First name is required. <br>";
				}
				if (strlen($fname) > 20){
					$errmsg .= "First name cannot be more than 20 alpha characters. <br>"; 	
				}
			}

			// validate last name
			if (isset($_POST["last_name"])){
				$lname = $_POST["last_name"];
				$lname = sanitise_input($lname);
				if ($lname == ""){
					$errmsg .= "Last name is required. <br>";
				}
				if (strlen($lname) > 20){
				$errmsg .= "Last name cannot be more than 20 alpha characters. <br>"; 	
				}
			}

			// validate Date of birth
			$dob_pattern = "/(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/";
			$dob = $_POST["dob"];
		        if(isset($dob))
		        {
		        	if ($dob == ""){
						$errmsg .= "Date of birth is required. <br>";
					}
					// check regex 
					elseif (preg_match($dob_pattern,$dob)!=1){
						$errmsg .= "Date of birth must be of format dd/mm/yyyy. <br>";	
					}
					else{
						$dob = strtr($dob, '/', '-');
			            $birthday = DateTime::createFromFormat('d-m-Y', $dob);
			            $today = new DateTime(date('d-m-Y'));
			            $age = $today->diff($birthday); // The value between birthday and today
			            if($age->y < 15 || $age->y > 80) {
			                $error .= "Age should be between 15 and 80! <br/>";
			            }
			            $dob = date("Y-m-d", strtotime($dob));     // to be in proper format when entering the database	
					}
		            
		        } else {
		            $error .= "Date of Birth is required. </br>";
		        }


			// validate gender
			$gender = $_POST["gender"];
			if (!isset($_POST["gender"])){
				$errmsg .="Gender should be selected. <br>";
			}

			// validate street address
			$street_address = $_POST["street_address"];
			$address_pattern = "/^[0-9a-zA-Z.\/ ]+$/";
			if (isset($_POST["street_address"])){
				if ($_POST["street_address"] == ""){
					$errmsg .= "Street address is required. <br>";
				}
				elseif (strlen($street_address) > 40){
					$errmsg .= "Street Address cannot be more than 40 alphanumeric characters. <br>"; 	
				}
				elseif (preg_match($address_pattern,$street_address)!=1){
					$errmsg .= "Street address format invalid. Only ./ and alphanumeric characters allowed. <br>";
				}
			}

			// validate suburb/town
			$suburb = $_POST["suburb"];
			if (isset($_POST["suburb"])){
				$suburb = sanitise_input($suburb);
				if ($suburb == ""){
					$errmsg .= "Suburb is required. <br>";
				}
				if (strlen($suburb) > 40){
				$errmsg .= "Suburb cannot be more than 40 alphanumeric characters. <br>"; 	
				}
			}


			// validate postcode
			$postcode = $_POST["postcode"];
			if (isset($_POST["postcode"])){
				$postcode = sanitise_input($postcode);
				if($postcode == ""){
					$errmsg .= "Postcode is required. <br>";
				}
				elseif(strlen($postcode)!==4){
					$errmsg .= "Postcode must be exactly 4 digits. <br>";
				}
				$state = $_POST["state"]; 
				$state = sanitise_input($state);
				// validate state
				if ($state == "VIC" && (substr($postcode,0,1)!="3" && substr($postcode,0,1)!="8")){
					$errmsg.="Postcode for Victoria must begin with 3 or 8. <br>";
				}
				elseif ($state == "NSW" && (substr($postcode,0,1)!="1" && substr($postcode,0,1)!="2")){
					$errmsg.="Postcode for New South Wales must begin with 1 or 2. <br>";
				}
				elseif ($state == "QLD" && (substr($postcode,0,1)!="4" && substr($postcode,0,1)!="9")){
					$errmsg.="Postcode for Queensland must begin with 4 or 9. <br>";
				}
				elseif ($state == "NT" && (substr($postcode,0,1)!="0")){
					$errmsg.="Postcode for Northern Territory must begin with 0. <br>";
				}
				elseif ($state == "WA" && (substr($postcode,0,1)!="6")){
					$errmsg.="Postcode for Western Australia must begin with 6. <br>";
				}
				elseif ($state == "SA" && (substr($postcode,0,1)!="5")){
					$errmsg.="Postcode for South Australia must begin with 5. <br>";
				}
				elseif ($state == "TAS" && (substr($postcode,0,1)!="7")){
					$errmsg.="Postcode for Tasmania must begin with 7. <br>";
				}
				elseif ($state == "ACT" && (substr($postcode,0,1)!="0")){
					$errmsg.="Postcode for Australian Capital Territory must begin with 0. <br>";
				}
			}

			// validate email
			$email = $_POST["email"];
			$email = sanitise_input($email);
			if (isset($email)){
				if (empty($email)){
					$errmsg .= "Email is required. <br>";
				}
				elseif (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
					$errmsg .= "Invalid email format. <br>";
				}
			}


			// validate phone number
			$phone = $_POST["phone"];
			if (isset($_POST["phone"])){
				$phone = sanitise_input($phone);
				if (empty($_POST["phone"])){
					$errmsg .= "Mobile is required. <br>";
				}
				else{
					if(!preg_match("/^[0-9 ]*$/",$_POST["phone"])){
						$errmsg .= "Only digits and white spaces allowed in phone number. <br>";
					}
					if (strlen($_POST["phone"]) < 8 || strlen($_POST["phone"]) > 12){
					$errmsg .= "Please enter a phone number with 8 to 12 digits or spaces.<br>";
					}	
				}
			}
			
			// validate other skills box
			$otherskills = $_POST["other_skill_text"];
			if (isset($_POST["other_skill_text"])){
				$otherskills = sanitise_input($otherskills);
			}
			if (isset($_POST["skills"])){
				if (count($_POST["skills"])==0){
				$errmsg .= "No skills selected. <br>";
			}
				else{
					$skills = "";
					foreach($_POST["skills"] as $sk){
						if ($sk == "otherskills" && empty ($otherskills)){
							$errmsg .= "Other skills is required. <br>";
						}
						if ($sk != "otherskills"){
							$skills .= ($sk.",");
						}
					}
				}	
			}
			

			// Make Decision
			if ($errmsg != ""){
				$result = FALSE;
				header("location:apply.php?msg=$errmsg");
			}
			else{
				// Connect to mySQL
				require_once("settings.php");
				$query = "CREATE TABLE IF NOT EXISTS eoi (eoinumber int(4) auto_increment PRIMARY KEY, job_reference_number VARCHAR(5), first_name VARCHAR(20), last_name VARCHAR(20), gender VARCHAR(7), street_address VARCHAR(40), suburb VARCHAR(40), state VARCHAR(3), postcode VARCHAR(4), email_address VARCHAR(30), phone_number VARCHAR(15), skills VARCHAR(100), other_skills VARCHAR(100), dob DATE, app_date DATE, status VARCHAR(10));";
				
				// Check connection
				if ($connObj->connect_error) {
				  die("Connection failed: " . $conn->connect_error);
				}
				// echo "Connected successfully";
				$result = mysqli_query($connObj,$query);
				if (!$result){
					die("Query statement Error (".$connObj->errno.")");
				}
				
				// Insert eoi record to eoi table
				$query = "INSERT INTO `eoi` (`job_reference_number`, `first_name`, `last_name`, `gender`,`street_address`, `suburb`, `state`, `postcode`, `email_address`, `phone_number`, `skills`, `other_skills`, `dob`, `app_date`, `status`) VALUES ('$ref_id','$fname','$lname','$gender','$street_address','$suburb','$state','$postcode','$email','$phone','$skills','$otherskills','$dob',CURDATE(),'New')";
				
				$result = @mysqli_query($connObj,$query);
				if ($result){
					echo "<p>Your EOI inserted successfully.</p>";
					// Display the autogenerate EOI number
					$query = "SELECT eoinumber FROM `eoi` WHERE `job_reference_number` = '$ref_id' AND `first_name` = '$fname' AND `last_name` = '$lname' AND `phone_number` = '$phone'";
					$result = mysqli_query($connObj,$query);
					$record = mysqli_fetch_assoc($result);
					echo "<p> Your EOI: ".$record['eoinumber']."</p>";
				}else{
					echo "<p>'$query'</p>";
					echo "<p>Insert operation unsuccessful.</p>";
					die("Query statement Error (".$connObj->errno.")");
				}
				$connObj -> close();
			}
		?>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>