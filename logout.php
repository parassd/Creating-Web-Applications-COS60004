<?php 
	session_start();
	unset($_SESSION['logon']);
	header("location:login.php?msg=You have successfully logged out. Please log back in to continue your session.");
?>