<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VIT-SFI(Home)</title>
	 <?php include"topbar.php"; require"dbcon.php";?>
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
		<table border="1" bgcolor="#b0b3b7" width="95%" align="right">
			<th>New Messages</th>
			<?php 
				$rgno = $_SESSION['rgno'];
				$sql = "SELECT * FROM `message` WHERE rcvd = '$rgno'";	
				$msgs=($conn->query($sql))->fetch_assoc();
				if(empty($msgs)){
					echo "<tr><td>No new messages for you</td></tr>";
				}
			?>
		</table>
	</div>
	<div class="right">
		<fieldset>
			<legend align="center">Spotlight:</legend>
				<iframe src="https://academicscc.vit.ac.in/include_spotlight_part01.asp" width="970px" height="500px" align="middle"></iframe>
		</fieldset>
	</div>
</body>
</html>