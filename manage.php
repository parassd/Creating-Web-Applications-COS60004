<?php 
	session_start();
	if ($_SESSION['logon']!=1){ 
	    header("location:login.php?msg=Error: Cannot access manager page directly, you must login first.");
	    die();
	}
?>
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
 		<article>
 			<?php
 				echo "<h1> Welcome ".$_SESSION['name']."</h1>";
 				echo "<p> Please click here to <a href='logout.php'>logout</a></p>";
 			?>
 			<h3> Job Application Table </h3>
 			<?php
 			// check if first name and last name have been filled in the text fields
 				if (!isset($_POST["fn"]) && !isset($_POST["ln"])){
 					// if text field blank display all records
 					$query = "SELECT * FROM EOI;";
 				}else {
 					// display records as per the input in the text field
 					$fn = trim($_POST["fn"]);
 					$ln = trim($_POST["ln"]);
 					$job_ref = trim($_POST["job_ref"]);
 					// SQL query to select records with similar labels
 					$query = "SELECT * FROM EOI WHERE first_name LIKE '%$fn%' AND last_name LIKE '%$ln%' AND job_reference_number LIKE '%$job_ref%'";
 				}
 				// Load mySQL credentials
 				require_once "settings.php";
 				if ($connObj){
 					$result = mysqli_query ($connObj,$query);
 					if ($result){
 						$record = mysqli_fetch_assoc($result);
 						if ($record) { //check if any record exists

 							echo "<table border = '1'>";
 							echo "<tr><th>EOI#</th>
 								  <th>Job Ref</th>
 								  <th>First Name</th>
 								  <th>Last Name</th>
 								  <th>Gender</th>
 								  <th>Street Address</th>
 								  <th>Suburb</th>
 								  <th>State</th>
 								  <th>Postcode</th>
 								  <th>E-mail</th>
 								  <th>Phone</th>
 								  <th>Skills</th>
 								  <th>DOB</th>
 								  <th>Application Date</th>
 								  <th>Status</th>
 								  <th>Update Status</th>
 								  <th></th>
 								  </tr>";
 							while ($record){
 								echo "<tr><td>{$record['eoinumber']}</td>
 								  <td>{$record['job_reference_number']}</td>
 								  <td>{$record['first_name']}</td>
 								  <td>{$record['last_name']}</td>
 								  <td>{$record['gender']}</td>
 								  <td>{$record['street_address']}</td>
 								  <td>{$record['suburb']}</td>
 								  <td>{$record['state']}</td>
 								  <td>{$record['postcode']}</td>
 								  <td>{$record['email_address']}</td>
 								  <td>{$record['phone_number']}</td>
 								  <td>{$record['skills']}</td>
 								  <td>{$record['dob']}</td>
 								  <td>{$record['app_date']}</td>
 								  <td>{$record['status']}</td>";
 								  echo"<td>
 								  		<a href = 'updateStatus.php?statusupdate=\"Current\"&eoinumber=".$record['eoinumber'] ."'>Current</a>
 								  		<a href ='updateStatus.php?statusupdate=\"Final\"&eoinumber=".$record['eoinumber'] ."'>Final</a>
 								  		</td>";
 								  echo "<td><a href = 'delete.php?eoinumber=".$record['eoinumber']."'>Delete</a></td></tr>";
 								  $record = mysqli_fetch_assoc($result);
 							} //end of while loop
 							echo "</table>";
 							mysqli_free_result($result);
 						}else{
 							echo "<p> No records retrieved. </p>";
 						}
 					}else{
 							echo "<p> Job application table doesn't exist or select operation unsuccessful.</p>";
 					}
 					mysqli_close($connObj); //Close the database connection
 				}else{
 					echo "<p> Unable to connect to the database.</p>";
 				}
 				?>
 				<h2>Manage the database!</h2> 
 				<form action = "manage.php" method = "post">
 					<fieldset>
 						<legend>Search Application</legend>
	 					<p><label>First name: <input type = "text" name = "fn" /></label></p>
	 					<p><label>Last name: <input type = "text" name = "ln" /></label></p>
	 					<p><label>Job Reference Number: <input type = "text" name = "job_ref" /></label></p>
	 					<input type = "submit" value ="Search"/>	
 					</fieldset>
 				</form>
 				<br>
 				<fieldset>
					<legend>Delete using Job Reference Number</legend>
	 				<form action = "deleteJob.php" method = "post">
	 					<p><label>Job Ref: <input type = "text" name = "jobref" /></label></p>
	 					<input type = "submit" value ="Delete"/>
	 				</form>
 				</fieldset>
 				<br>
		</article>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>
