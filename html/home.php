<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VIT-SFI(Home)</title>
	<?php include"topbar.php"; require"dbcon.php"; ?>
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
	<div class="right">
		<fieldset>
			<legend align="center">Spotlight:</legend>
			<iframe src="https://academicscc.vit.ac.in/include_spotlight_part01.asp" width="950px" height="500px" align="middle"></iframe>
		</fieldset>
	</div>
</body>
</html>