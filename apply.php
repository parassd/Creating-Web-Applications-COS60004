<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Job Application Form" />
  	<meta name="keywords" content="HTML5, tags" />
  	<meta name="author" content="Paras Sood"  />
  	<link href = "styles/style.css" rel = "stylesheet"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  	<title>Job Application Form</title>
  	<script src = "scripts/apply.js"></script>
</head>
<body id = "apply_page">
	<?php
		include_once("sidenav.inc");
	?>
	<?php
		include_once("header.inc");
	?>
	<?php
		include_once("nav.inc");
	?>
	<aside id = "enhancements_js">
		 <!-- timer container -->
		<div class="enhancement_1">
			<h2><span id = timer></span></h2>
			<p id = "comment"></p>
		</div> 
	</aside>
	<form id = "application_form" method="post" action="processEOI.php">
		<h1>Application form</h1>
		<p>
			<label for = "ref_id">Job reference number</label><br>
			<input type = "text" name = "ref_id" id = "ref_id" class = "input_form"/></p>
		<p>
			<label for = "first_name">First name</label><br>
			<input type = "text" name = "first_name" id = "first_name" class = "input_form"></p>
		<p>
			<label for = "last_name">Last name</label><br>
			<input type = "text" name = "last_name" id = "last_name" class = "input_form"></p>
		<p>
			<label for = "dob">Date of Birth</label><br>
			<input type = "text" name = "dob" id = "dob" placeholder="dd/mm/yyyy" class = "input_form"></p>
		<fieldset>
			<legend>Gender</legend>
			<p>
				<input type = "radio" name = "gender" value = "M" id = "radio_button_1">
				<label for = "radio_button_1">Male</label>
				<input type = "radio" name = "gender" value = "F" id = "radio_button_2">
				<label for = "radio_button_2">Female</label>
				<input type = "radio" name = "gender" value = "Other" id = "radio_button_3">
				<label for = "radio_button_3">Other</label>
			</p>
		</fieldset>
		<p>
			<label for = "street_address">Street Address</label><br>
			<input type = "text" name = "street_address" id = "street_address" class = "input_form"> 
		</p>
		<p><label for = "suburb">Suburb/Town</label><br>
			<input type = "text" name = "suburb" id = "suburb" class = "input_form"> 
		</p>
		<p>
			<label for = "state">State</label><br>
			<select name = "state" id = "state">
				<option value = "VIC">VIC</option>
				<option value = "NSW">NSW</option>
				<option value = "QLD">QLD</option>
				<option value = "NT">NT</option>
				<option value = "WA">WA</option>
				<option value = "SA">SA</option>
				<option value = "TAS">TAS</option>
				<option value = "ACT">ACT</option>
			</select>
		</p>
		<p>
			<label for = "postcode">PostCode</label><br>
			<input type = "text" name = "postcode" id = "postcode" class = "input_form"> 
		</p>
		<p>
			<label for = "email">Email address</label><br>
			<input type = "text" name = "email" id = "email" class = "input_form"> 
		</p>
		<p>
			<label for = "phone">Phone number</label><br>
			<input type = "text" name = "phone" id = "phone" class = "input_form"> 
		</p>
		
		<fieldset>
			<legend>Skills</legend>
			<p>
				<label for = "checked_button_1">HTML</label>
				<input type = "checkbox" name = "skills[]" value = "HTML" id = "skills">
				<label for = "checked_button_2">CSS</label>
				<input type = "checkbox" name = "skills[]" value = "CSS" id = "skills">
				<label for = "checked_button_3">JavaScript</label>
				<input type = "checkbox" name = "skills[]" value = "JavaScript" id = "skills">
				<label for = "checked_button_4">PHP</label>
				<input type = "checkbox" name = "skills[]" value = "PHP" id = "skills">
				<br>
				<label for = "checked_button_5">Other skills</label>
				<input type = "checkbox" name = "skills[]" value = "otherskills" id = "other_skills">
				<textarea name = "other_skill_text" id = "other_skill_text" placeholder="Other skills..." rows="4" cols="40"></textarea>
			</p>
		</fieldset>		
	<p>
		<input type="submit" value="Apply"/>	
		<input type="Reset" value="Reset form"/>	
	</p>
	<p>
		<div>
			<?php
				if (isset($_GET["msg"])){
					echo "Error: <br>".$_GET["msg"]."<br>";
				}
			?>
		</div>
	</p>
	</form>
	<br>
	<?php
		include_once("footer.inc");
	?>
</body>
</html>