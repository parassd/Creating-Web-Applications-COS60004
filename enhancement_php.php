<!DOCTYPE html> 
<html lang="en">
	<head>
		<title>Super IT Consultant</title>
		<meta charset="utf-8" />
		<meta name="description" content="Enhancements Page" />
		<meta name="keywords" content="HTML5, CSS Media Query" />
		<meta name="author" content="Paras Sood"  /> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "styles/style.css" rel = "stylesheet"/>
		<script src = "scripts/apply.js"></script>
	</head>
	<body id = "main">
		<?php
			include_once("sidenav.inc");
		?>
		<?php
			include_once("header.inc");
		?>
		<?php
			include_once("nav.inc");
		?>
		<article>
			<p id = "enhance">
				<br>For the purposes of third part of this assignment, two key enhancements were used.<br>
			</p>
			<ol>
				<li><strong>Manager registration & Database </strong>
					<ul>
						<li><a href = "signup.php">Click here</a></li>
						<li>Sign up page created.</li>
						<li>Database created to maintain a record of managers on the website.</li>
						<li>Server side validation requiring unique username and a password rule, and store this information in a table.</li>
						<li>Control access to manage.php by checking username and password.</li>
						<li>Username is checked from the database and username cannot be repeated, error message shown if username already taken.</li>
						<li>User made to confirm password by entering it twice and server side validation for passwords to match.</li>
						<li><strong><a href = "https://www.w3schools.com/howto/howto_css_signup_form.asp">Reference</a></strong></li>
					</ul>
				</li>
				<br>
				<li><strong>Login & logout pages</strong>
					<ul>
						<li><a href = "login.php">Click here</a></li>
						<li>Login and logout pages created.</li>
						<li>Create a log out page with a link from the manage web page.</li>
						<li>Manager does not need to login again to accesss manage tab once he has logged in. Manage tab available until they logout.</li>
						<li>Ensure the manager’s web site cannot be entered directly using a URL after logging out.</li>
						<li><strong><a href = "https://www.studentstutorial.com/php/login-logout-with-session">Reference</a></strong></li>
					</ul>
				</li>
			</ol>
		</article>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>
