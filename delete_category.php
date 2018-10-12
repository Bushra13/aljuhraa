<?php include("header.php");?>
<?php include("slide.php");?>
<div id="container">
<div id="details">
	<div id="msg"></div>

<?php

	if(isset($_REQUEST['categoryID']))
	{
		$sql="select * from products where categoryID=".$_REQUEST['categoryID'];
		$query=mysql_query($sql);
		$result=mysql_num_rows($query);
		if($result>0)
		{
			?>
			<script type="text/javascript">
            	$("#msg").html("لا يمكن حذف الفئة هذه لأنها مرتبطه ببعض المنتجات").slideDown(1000).delay(3000).slideUp(1000,function(){
					$("#msg").after('<a href="show_category.php" style="text-align:center;font-size:18px;">عرض الفئات المضافه</a>');
					});
				
				
            </script>
			<?php
			
		}	
		else
		{
			$sql="delete from categoryproduct where categoryID=".$_REQUEST['categoryID'];
			$query=mysql_query($sql);
			header("Location:show_category.php");
			
		}
	}
 ?>
 </div>
</div>
<?php include("footer.php");?>