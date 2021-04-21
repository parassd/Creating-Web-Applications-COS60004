<!DOCTYPE html> 
<html lang="en">
	<head>
		<title>Super IT Consultant</title>
		<meta charset="utf-8" />
		<meta name="description" content="Website Home Page" />
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
		<br>
		 <article>
			<section id = "main_heading">
				<h1 id = "head_1"> Meet your new IT department as an Army of One</h1><br><br><br>
				<h3 id = "head_2">One stop solution for all your IT problems</h3>
			</section>
			<section id="usp_block">
				<div class = "usp">
					<img src = "images/expert_team.svg" alt="expert team">
					<h3>Efficiency of a team</h3>
					<p>
						Expert IT Professional at your service with the efficiency of a team of 5
					</p>
				</div>
				<div class = "usp">
					<img src = "images/affordable_cost.svg" alt="affordable cost">
					<h3>Affordable IT solutions</h3>
					<p>
						Get work done of an entire team on the payroll of one consultant
					</p>
				</div>
				<div class = "usp">
					<img src = "images/easy_onboarding.svg" alt="easy onboarding">
					<h3>Easy Onboarding</h3>
					<p>
						Start getting work done the moment you sign us.
					</p>
				</div>
				<div class = "usp">
					<img src = "images/expert_solutions.svg" alt = "expert solutions">
					<h3>Improved Security</h3>
					<p>
						No need to worry about hackers, we've got it all covered.
					</p>
				</div>
			</section>
		</article>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>
