<!DOCTYPE html> 
<html lang="en">
	<head>
		<title>Super IT Consultant</title>
		<meta charset="utf-8" />
		<meta name="description" content="About Page" />
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
			<figure>
				<img src = "images/ps.jpg" alt = "An image of me!" id = "ps"/>
			</figure>
			<h1>About me</h1>
			<section id = "details">
				<dl>
					<dt>Name:</dt> 
					<dd>Paras Sood</dd>
					<dt>Student Number:</dt>
					<dd>1003498200</dd>
					<dt>Tutor's name:</dt>
					<dd>Mohammad Ahmadi</dd>
					<dt>Course name:</dt>
					<dd>Master of Information Technology</dd>
					<dt>E-mail:</dt>
					<dd><a href="mailto:103498200@student.swin.edu.au">103498200@student.swin.edu.au</a></dd>
				</dl>
			</section>
			<section id = "timetable_section">
				<h3>My Timetable</h3>
				<table id = "timetable">
					<tr>
						<th>Day/Class</th>
					    <th>Mon</th>
					    <th>Tues</th>
					    <th>Wed</th>
					    <th>Thurs</th>
					    <th>Fri</th>
				    </tr>
			        <tr>
					    <td>COS60004</td>
					    <td>No class</td>
					    <td>No class</td>
					    <td>10am - 2pm</td>
					    <td>No class</td>
					    <td>No class</td>
					</tr>
					<tr>
					    <td>COS60006</td>
					    <td>No class</td>
					    <td>No class</td>
					    <td>2pm - 6pm</td>
					    <td>No class</td>
					    <td>No class</td>
					</tr>
					<tr>
						<td>INFO60007</td>
					    <td>No class</td>
					    <td>No class</td>
					    <td>No class</td>
					    <td>1pm - 5pm</td>
					    <td>No class</td>
					</tr>
					<tr>
						<td>TNE60002</td>
					    <td>No class</td>
					    <td>9am - 1pm</td>
					    <td>No class</td>
					    <td>No class</td>
					    <td>No class</td>
					</tr>
				</table>
			</section>
		</article>
		<br>
		<?php
			include_once("footer.inc");
		?>
	</body>
</html>
