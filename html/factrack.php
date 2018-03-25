<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Faculty Track</title>
	<?php 
	include 'topbar.php';
	include 'dbcon.php';
		$txt = '';
	if(isset($_POST['update'])){
		$usr = $_SESSION['fcid'];
		$status = $_POST['status'];
		$msg = $_POST['msg'];
		$sqli = "UPDATE `track` SET `status`='$status',`message`='$msg' WHERE `fcid`='$usr' ";
		$f = $conn->query($sqli) or die("Error unable to update.");
		if($f){
			$txt = 'Successfully updated status';
		}
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
			<br><br><p align="center" color='black'><b>Faculty Track</b></p>
			<table align="center" valign='center' bgcolor="#649ffc" cellpadding="10px" style="margin-top: 18%;">
				<?php
				if($_SESSION['u']=='f')
				{	
					echo "<tr><td>Select your status </td>
					<td>
					<select name='status'>
					<option value='1'> Available </option>
					<option value='0'> Not Available </option>
					</select>
					</td></tr>
					<tr><td>Custom Message:</td>
					<td><textarea name='msg'></textarea><br></td>
					<tr><td colspan= 2 align=center><input type='submit' name='update' value='Update' /></td></tr>
					<tr><td colspan=2 align=center>$txt</td></tr>";
				}
				if($_SESSION['u']=='s')
				{
					echo '<tr><td>Select the faculty to send a message:</td>
					<td><select name="u1">
					<option value="0"> Select a Faculty </option> 
					<option value="50001">Faculty 1</option>
					<option value="50002">Faculty 2</option>
					<option value="50003">Faculty 3</option>
					<option value="50004">Faculty 4</option>
					</select></td></tr>';
					if(isset($_POST['view'])){
						if(!$_POST['u1']==0){
						$usr = $_POST['u1'];
						$sqlis = "SELECT * FROM `track` WHERE `fcid`='$usr' ";
						$b = $conn->query($sqlis) or die("Error unable to update.");
						$b = $b->fetch_assoc();
						$c = $b['message']; 
						$sqln = "SELECT `name` FROM `faculty` WHERE `fcid`='$usr'";
								$sqln = $conn->query($sqln)->fetch_assoc() or die('Unable to fetch name');
								$d = $sqln['name'];
						echo "<tr><td>Name:</td><td>$d</td>";
						echo "<tr><td>Status:</td><td>";if($b['status']==0) echo"Not Available";else echo "Available";echo"</td></tr>";
						echo "<tr><td>Message:</td><td>$c</td></tr>";
						if($_POST['u1']==0){
					echo "<tr><td align= center colspan=2>Please select a Faculty</td></tr>";
				}
					}}

					echo '<tr><td colspan= 2 align=center><input type="submit" name="view" value="view" /></td></tr>';
				}
				
				?>
			</table>

		</form>

	</div>
</body>
</html>
