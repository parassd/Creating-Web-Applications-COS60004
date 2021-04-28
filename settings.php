<?php
	$connObj = mysqli_connect('localhost','root','','applications');
	if($connObj->connect_error){
		die("Connection Error (".$connObj->connect_errno.")");
	}
?>