<?php 
session_start();
require 'dbcon.php';
if(isset($_POST['login'])){
	$rgno = $_POST['rgno'];
	$pass = $_POST['pass'];
	$_SESSION['u']='s';
	if($rgno == NULL || $pass == NULL)
	{
		$err = "Registration Number or Password cannot be left blank";
		header("Location:".$_SERVER['PHP_SELF']);
	}
	$sql = "SELECT `password` FROM `stlogin` WHERE rgno = '$rgno'";
	$res = $conn->query($sql) or die('Error connecting');
	$a = $res->fetch_assoc();
	$b = $a['password'];
	if ($res->num_rows == 0) {
		$err = "No such User found. Please Register first.";
	}
	elseif ($pass == $b) {
		$_SESSION['rgno'] = $rgno;
		header("Location:home.php");
	}
}
if(isset($_POST['reg'])){
	$name = $_POST['name'];
	$rgno = $_POST['regno'];
	$email = $_POST['email'];
	$pass = $_POST['regpass'];
	$rpass = $_POST['regrpass'];
	if($rpass != $pass)
		$err = "Passwords don't match!";
	$sql = "INSERT INTO `stlogin` (`rgno`, `password`) VALUES ('$rgno', '$pass') ";
	$sql2 = "INSERT INTO `student` (`rgno`, `name`, `email`) VALUES ('$rgno', '$name', '$email') ";
	$conn->query($sql) or die($conn->error);
	$conn->query($sql2) or die($conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SFI(Student Login)</title>
	<link rel="stylesheet" href="../css/topbar.css">
	<link rel="stylesheet" href="../css/login.css">
	<!-- <link rel="stylesheet" href="../css/home.css"> -->
</head>
<body>
	<ul>
		<li style="float: left; padding: 10px;"><img src="../images/vit.png" alt="logo" height="70px"></li>
		<li style="text-align: center; float: none;"><p>Student Faculty Interface(Student)<br>VIT CHENNAI</p></li>
	</ul>
	<form name="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<ul>
			<li><input type="submit" name="login" value="Log In"></li>
			<li><input type="password" name="pass" placeholder="Password" required></li>
			<li><input type="text" name="rgno" placeholder="Registration Number" pattern="[1][3-7][a-zA-Z]{3}[1-9][0-9]{3}" autofocus required></li>
		</ul>
	</form>
	<br>
	<p id="err"><?php echo "$err"; ?></p>
	<br>
	<br>
	<form name="register"action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<fieldset>
			<h1>New Here?</h1>
			<input type="text" name="name" placeholder="Name" required>
			<input type="text" name="regno" pattern="[1][3-7][a-zA-Z]{3}[1-9][0-9]{3}" placeholder="Registration Number" required>
			<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email ID" required>
			<input type="password" name="regpass" placeholder="Password" required>
			<input type="password" name="regrpass" placeholder="Retype Password" required><br>
			<input type="submit" name="reg" value="Register">

		</fieldset>
	</form>
</body>
</html>