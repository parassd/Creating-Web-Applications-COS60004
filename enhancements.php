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
				<br>For the purposes of this assignment, two key enhancements were used.
			</p>
			<ol>
				<li><strong>SVG logo</strong>
					<ul>
						<li><a href = "#navigation_menu">Click here</a></li>
						<li>This was used to design a logo for the IT Company.</li>
						<li>To implement this, the SVG element was required.</li>
						<li>It was put inside the header element on each page.</li>
						<li><strong><a href = "">Reference</a></strong></li>
					</ul>
				</li>
				<br>
				<li><strong>Responsive navigation buttons</strong>
					<ul>
						<li><a href = "#logo">Click here</a></li>
						<li>This was used to make the navigation menu more interactive.</li>
						<li>The click of a button gives the impression of the button being pressed.</li>
						<li>CSS code was added to the menu class inside the nav element.</li>
						<li>When the menu is in active state (or the cursor/pointer is clicked on the screen) the menu is translated in the Y axis direction to give the illusion of pressing a button.</li>
						<li>This was achieved by using the psuedo class active</li>
						<li><strong><a href = "https://www.w3schools.com/css/css3_buttons.asp">Reference</a></strong></li>
					</ul>
				</li>
			</ol>
		</article>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>
