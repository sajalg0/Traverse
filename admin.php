<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<frameset rows ="10%,90%" frameborder = "0" >
	<frame src="upper.html" name="f1" scrolling=no>
	<frameset cols="15%,80%" frameborder = "0">
		<frame src="Side.html" name="f2" scrolling=no>
		<frame src ="addpackage.php" name="f3">
	</frameset>
	
</frameset>
</html>