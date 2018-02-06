<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Faculty Track</title>
	<?php 
		include 'topbar.php';
		include 'dbcon.php';
	 ?>
</head>
<body>
	<?php
		if($_SESSION['u']=='f')
		{	echo "Faculty";
		}
		if($_SESSION['u']=='s'){
			echo "student";
		}
	?>
</body>
</html>