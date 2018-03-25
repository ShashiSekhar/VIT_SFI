<table border="1" width="98%" height = "100%" cellpadding="0" cellspacing="0">
			<tr valign="top"><td><table border="1" bgcolor="#b0b3b7" width="100%" align="right" >
							<?php 
			if($_SESSION['u']=='s'){
				$rgno = $_SESSION['rgno'];
				$sql = "SELECT `sent`,`msg`,`time` FROM `message` WHERE rcvd = '$rgno'";	
			}
			elseif ($_SESSION['u']=='f') {
				$fcid = $_SESSION['fcid'];
				$sql = "SELECT `sent`,`msg`,`time` FROM `message` WHERE rcvd = '$fcid'";	
			}
			$msgs=($conn->query($sql));
			$a = $msgs->num_rows;
			if($a != 0)
				echo "<th colspan=2>New Messages</th>";
			if($a == 0){
				echo "<tr><td align='center'>No new messages for you</td></tr>";
			}
			else{
				for($i=0;$i<$a;$i++)
				{
					$msg = $msgs->fetch_assoc();
					foreach ($msg as $key => $value) {
						if($key == 'sent'){
							if($_SESSION['u']=='s'){
								$sqln = "SELECT `name` FROM `faculty` WHERE `fcid`='$value'";
								$sqln = $conn->query($sqln)->fetch_assoc() or die('Unable to fetch name');
								$nm = $sqln['name'];

							}
							if($_SESSION['u']=='f'){
								$sqln = "SELECT `name` FROM `student` WHERE `rgno`='$value'";
								$sqln = $conn->query($sqln)->fetch_assoc() or die('Unable to fetch name');
								$nm = $sqln['name'];

							}
						}
						if($key == 'sent')	
							echo "<tr><td><b>$value - $nm</b><br>";
						if($key == 'msg')
							echo "$value<br>";
						if($key == 'time')
							echo "$value</td></tr>";
					}
				}

			}
			?>
			</table></td></tr>
		</table>