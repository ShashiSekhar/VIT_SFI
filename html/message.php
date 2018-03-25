<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Faculty Track</title>
	<?php 
	include 'topbar.php';
	include 'dbcon.php';
	if(isset($_POST['send'])){
		if($_SESSION['u']=='s')
		{$snd = $_SESSION['rgno'];
		$rcv = $_POST['u1'];
		$msg = $_POST['msg'];
		$sqli = "INSERT INTO `message` (`sent`, `rcvd`, `msg`) VALUES ('$snd', '$rcv', '$msg')";
		$conn->query($sqli) or die("Error unable to send message.");}
		if($_SESSION['u']=='f'){$snd = $_SESSION['fcid'];
		$rcv = $_POST['u1'];
		$msg = $_POST['msg'];
		$sqli = "INSERT INTO `message` (`sent`, `rcvd`, `msg`) VALUES ('$snd', '$rcv', '$msg')";
		$conn->query($sqli) or die("Error unable to send message.");}
	}
	?>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>

<body>
	<div class="left">
		<ul>
			<li><a href="home.php" target="_self">Home</a></li>
			<li><a href="factrack.php" target="_self">Track Faculty</a></li>
			<li><a href="message.php" target="_self">Send a Message</a></li>
		</ul>
	</div>
	<div class="rightr">
		<?php include 'msgbar.php'; ?>
	</div>
	<div class ="right">
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" name='msgform' method='post'>	
	<br><br><p align="center" color='black'><b>Send a Message</b></p>
				<table align="center" valign='center' bgcolor="#649ffc" cellpadding="10px" style="margin-top: 18%;">
			<?php
			if($_SESSION['u']=='f')
			{	
				echo '<tr><td>Enter the student\'s registration number send a message:</td>
					<td><input type=text name=u1 pattern="[1][3-7][a-zA-Z]{3}[1-9][0-9]{3}" required /></td></tr>
					<tr><td>Message:</td>
					<td><textarea name="msg"></textarea><br></td>
					<tr><td colspan= 2 align=center><input type="submit" name="send" value="send" /></td></tr>';
			}
			if($_SESSION['u']=='s')
			{
				echo '<tr><td>Select the faculty to send a message:</td>
					<td><select name="u1">
						<option value="50001">Faculty 1</option>
						<option value="50002">Faculty 2</option>
						<option value="50003">Faculty 3</option>
						<option value="50004">Faculty 4</option>
					</select></td></tr>
					<tr><td>Message:</td>
					<td><textarea name="msg"></textarea><br></td>
					<tr><td colspan= 2 align=center><input type="submit" name="send" value="send" /></td></tr>';
			}
			?>
		</table>

				</form>

	</div>
</body>
</html>
