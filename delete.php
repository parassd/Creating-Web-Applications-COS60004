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
		<!-- <script src = "scripts/apply.js"></script> -->
	</head>
	<body id = "delete_page">
		<?php
			include_once("sidenav.inc");
			include_once("header.inc");
			include_once("nav.inc");
		?>
		<?php
			if (isset($_GET["eoinumber"])){
				$eoinumber = $_GET["eoinumber"];
			}
			else{
				header("location: manage.php");
				exit();
			}
			// load mySQL credentials
			require_once "settings.php";
			if ($connObj){
				$query = "DELETE FROM eoi where eoinumber = '$eoinumber'";
				$result = mysqli_query($connObj,$query);
				if ($result){
					echo "<p>Delete operation successful.</p>";
				} else{
					echo "<p>Delete operation NOT successful.</p>";
				}
				mysqli_close($connObj);
			}else{
				echo "<p> Unable to connect to the database. </p>";
			}
		?>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>
