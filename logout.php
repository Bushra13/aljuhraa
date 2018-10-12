<?php include("header.php");?>
<?php
	$sql="update users set lastAppearance=now() where userID=".$_SESSION['userID'];
	$query=mysql_query($sql);
	session_destroy();
	header("Location:index.php");
?>
<?php include("footer.php");?>