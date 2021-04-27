<?php
	$connObj = mysqli_connect('localhost','root','','test');
	if($connObj->connect_error){
		die("Connection Error (".$connObj->connect_errno.")");
	}
?>