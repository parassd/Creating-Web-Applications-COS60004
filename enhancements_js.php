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
				<br>For the purposes of the second part of this assignment, two key enhancements were used.
			</p>
			<ol>
				<li><strong>Side Navigation Menu</strong>
					<ul>
						<li><a href = "#openSideNav">Click here</a></li>
						<li>This was used to create a side navigation menu for the IT Company website.</li>
						<li>To implement this, a div element had to be added to the header of all of the webpages.</li>
						<li>Changes were made to the style of this webpage, triggered by clicking the burger menu on the top left of all the webpages.</li>
						<li><strong><a href = "https://www.w3schools.com/howto/howto_js_sidenav.asp">Reference</a></strong></li>
					</ul>
				</li>
				<br>
				<li><strong>Timer for job application</strong>
					<ul>
						<li><a href = "apply.html">Click here</a></li>
						<li>This was used to set a limited time for filling out the application.</li>
						<li>The applicant has only a minute to fill out the form.</li>
						<li>They are displayed different prompts at intervals of 30 seconds until 2 minutes are over.</li>
						<li>When a minute is over, an alert notifies the user that the time is up.</li>
						<li>The user is redirected to the careers page.</li>
						<li><strong><a href = "https://www.educative.io/edpresso/how-to-create-a-countdown-timer-using-javascript">Reference</a></strong></li>
					</ul>
				</li>
			</ol>
		</article>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>
