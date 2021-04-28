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
	<style>
	form {border: 3px solid #f1f1f1;}

	input[type=text], input[type=password] {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  box-sizing: border-box;
	}

	button {
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  cursor: pointer;
	  width: 100%;
	}

	button:hover {
	  opacity: 0.8;
	}

	.cancelbtn {
	  width: auto;
	  padding: 10px 18px;
	  background-color: #f44336;
	}

	.imgcontainer {
	  text-align: center;
	  margin: 24px 0 12px 0;
	}

	img.avatar {
	  width: 20%;
	  border-radius: 50%;
	}

	.container {
	  padding: 16px;
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
	  .cancelbtn {
	     width: 100%;
	  }
	}
	</style>
	</head>
	<body>
		<?php
			include_once("sidenav.inc");
			include_once("header.inc");
			include_once("nav.inc");
		?>
		<h2>Sign up Form for Managers</h2>
		<form action="process_signup.php" method="post">
		  <div class="imgcontainer">
		    <img src="images/signup_avatar.jpeg" alt="Avatar" class="avatar">
		  </div>
		  <div class="container">
		  	<label for="fullname"><b>Full name</b></label>
		    <input type="text" placeholder="Enter Full Name" name="fullname" required>
		    <label for="uname"><b>Username</b></label>
		    <input type="text" placeholder="Enter Username (Must be between 5 and 20 characters)" name="uname" required>
		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password (Must be between 5 and 20 characters)" name="psw" required>
		    <label for="pswconfirm"><b>Confirm Password</b></label>
		    <input type="password" placeholder="Enter Password again to confirm" name="pswconfirm" required>
		    <button type="submit">Create Account</button>
		</form>
		<div>
			<?php
				if (isset($_GET["msg"])){
					$msg = $_GET["msg"];
					$checkerror = explode(" ",$msg);
					if ($checkerror[0] == "Error:"){
						echo "<br><p style = 'color:red'>".$_GET["msg"]."</p>";
					}
					else{
						echo "<br>".$_GET["msg"]."<br>";	
					}
				}
				echo "<p>Already have an account? Click <a href = 'login.php'>here</a> to login!</p>";
			?>
		</div>
		<br>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>