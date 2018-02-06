<?php 
include 'session.php';
	unset($_SESSION["uname"]);
	session_unset();
	session_destroy();
	header("Location:stu_login.php");
 ?>