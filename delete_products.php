<?php include("header.php");?>
<?php include("slide.php");?>
<?php

	if(isset($_REQUEST['productID']))
	{		
		$sql="delete from products where productID=".$_REQUEST['productID'];
		$query=mysql_query($sql);
		header("Location:show_products_admin.php");
		
	}
 ?>

<?php include("footer.php");?>