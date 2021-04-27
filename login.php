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
		<h2>Login Form</h2>
		<form action="process_login.php" method="post">
		  <div class="imgcontainer">
		    <img src="images/tt_avatar_small.jpeg" alt="Avatar" class="avatar">
		  </div>
		  <div class="container">
		    <label for="uname"><b>Username</b></label>
		    <input type="text" placeholder="Enter Username" name="uname" required>
		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="psw" required>
		    <button type="submit">Login</button>
		</form>
		<div>
			<?php
				if (isset($_GET["msg"])){
					echo "<br>".$_GET["msg"]."<br>";
				}
				echo "<p>Don't have an account? Click <a href = 'signup.php'>here</a> to register for a new account!</p>"
			?>
		</div>
		<br>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>