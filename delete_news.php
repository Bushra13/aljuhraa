<?php include("header.php");?>
<?php include("slide.php");?>
<?php

	if(isset($_REQUEST['newsID']))
	{		
		$sql="delete from news where newsID=".$_REQUEST['newsID'];
		$query=mysql_query($sql);
		header("Location:show_news.php");
		
	}
 ?>

<?php include("footer.php");?>