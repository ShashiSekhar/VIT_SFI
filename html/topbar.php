<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../css/topbar.css">
	<?php
		include 'session.php';
    	require 'dbcon.php';
		if($_SESSION['u']=='s'){
		$rgno = $_SESSION['rgno'];
		$sql="SELECT `name` FROM `student` WHERE rgno = '$rgno'";
		$uname = ($conn->query($sql))->fetch_assoc()['name'];
	}
	elseif ($_SESSION['u']=='f') {
		$fcid = $_SESSION['fcid'];
		$sql="SELECT `name` FROM `faculty` WHERE fcid = '$fcid'";
		$uname = ($conn->query($sql))->fetch_assoc()['name'];
	}
	 ?>
</head>
<body id="tb">

<ul>
	<li><img src="../images/vit.png" alt="logo" height="70px"></li>
	<li style="text-align: center; float: none;"><p>Student Faculty Interface<br>VIT CHENNAI</p></li>
</ul>
<ul>
	<li style="float:left;"><p id="udet">Username:&nbsp;&nbsp;<?php if($_SESSION['u']=='s') echo "$rgno";elseif ($_SESSION['u']=='f') echo "$fcid"; ?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo" $uname"; ?></p></li>
	<li style="float:right;"><a href="logout.php">Logout</a></li>
	<li style="float:right;"><a href="http://chennai.vit.ac.in/">Contact Us</a></li>
</ul>
</body>
</html>